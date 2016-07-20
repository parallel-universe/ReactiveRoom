<?php
namespace ReactiveRoom\Player;

use Doctrine\DBAL\Connection;
use ReactiveRoom\ModelMapper;
use ReactiveRoom\Terminal\TerminalModel;
use ReactiveRoom\Hardware\HardwareModel;
use ReactiveRoom\Software\SoftwareModel;
use ReactiveRoom\Network\NetworkModel;

class PlayerRepository
{
    private $conn;
    private $modelMapper;

    public function __construct(
        Connection $conn,
        ModelMapper $modelMapper
    ) {
        $this->conn = $conn;
        $this->modelMapper = $modelMapper;
    }

    public function findByUsername($username)
    {
        $fields = array(
            'player.id AS `player.id`',
            'player.created AS `player.created`',
            'player.updated AS `player.updated`',
            'player.username AS `player.username`',
            'player.email AS `player.email`',
            'player.terminalId AS `player.terminalId`',
            'terminal.id AS `terminal.id`',
            'terminal.created AS `terminal.created`',
            'terminal.updated AS `terminal.updated`',
            'terminal.name AS `terminal.name`',
            'terminal.ipAddress AS `terminal.ipAddress`',
            'terminal.networkId AS `terminal.networkId`',
            'hardware.id AS `hardware.id`',
            'hardware.created AS `hardware.created`',
            'hardware.updated AS `hardware.updated`',
            'hardware.name AS `hardware.name`',
            'hardware.type AS `hardware.type`',
            'hardware.level AS `hardware.level`',
            'software.id AS `software.id`',
            'software.created AS `software.created`',
            'software.updated AS `software.updated`',
            'software.name AS `software.name`',
            'software.type AS `software.type`',
            'software.level AS `software.level`',
            'network.id AS `network.id`',
            'network.created AS `network.created`',
            'network.updated AS `network.updated`',
            'network.name AS `network.name`',
        );

        $qb = $this->conn->createQueryBuilder();
        $qb->select($fields)
            ->from('player', 'player')
            ->innerJoin('player', 'terminal', 'terminal', 'terminal.id = player.terminalId')
            ->innerJoin('terminal', 'network', 'network', 'network.id = terminal.networkId')
            ->leftJoin(
                'terminal',
                'terminal_to_hardware_map',
                'terminal_hardware_map',
                'terminal_hardware_map.terminalId = terminal.id'
            )
            ->leftJoin(
                'terminal_hardware_map',
                'hardware',
                'hardware',
                'terminal_hardware_map.hardwareId = hardware.id'
            )
            ->leftJoin(
                'terminal',
                'terminal_to_software_map',
                'terminal_software_map',
                'terminal_software_map.terminalId = terminal.id'
            )
            ->leftJoin(
                'terminal_software_map',
                'software',
                'software',
                'terminal_software_map.softwareId = software.id'
            )
            ->where('player.username = :username')
            ->setParameter(':username', $username);

        $stmt = $qb->execute();
        $result = $stmt->fetchAll();

        $entityFields = array();
        foreach ($result as $row) {
            foreach ($row as $key => $value) {
                list($entity, $field) = explode('.', $key);
                if (!isset($entityFields[$entity])) {
                    $entityFields[$entity] = array();
                }
                if (in_array($entity, array('software', 'hardware'))) {
                    $entityId = $row[$entity . '.id'];
                    if (null !== $entityId && !isset($entityFields[$entity][$entityId])) {
                        $entityFields[$entity][$entityId] = array();
                    }
                    $entityFields[$entity][$entityId][$field] = $value;
                    continue;
                }
                $entityFields[$entity][$field] = $value;
            }
        }

        if (!empty($entityFields['software'])) {
            $entityFields['software'] = array_values($entityFields['software']);
        }

        if (!empty($entityFields['hardware'])) {
            $entityFields['hardware'] = array_values($entityFields['hardware']);
        }

        $terminal = new TerminalModel;
        $this->modelMapper->map($terminal, $entityFields['terminal']);

        $network = new NetworkModel;
        $this->modelMapper->map($network, $entityFields['network']);
        $terminal->setNetwork($network);

        foreach ($entityFields['hardware'] as $ware) {
            $hardware = new HardwareModel;
            $this->modelMapper->map($hardware, $ware);
            $terminal->addHardware($hardware);
        }

        foreach ($entityFields['software'] as $ware) {
            $software = new SoftwareModel;
            $this->modelMapper->map($software, $ware);
            $terminal->addSoftware($software);
        }

        $player = new PlayerModel;
        $this->modelMapper->map($player, $entityFields['player']);
        $player->setTerminal($terminal);

        return $player;
    }
}
