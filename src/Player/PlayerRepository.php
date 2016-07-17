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
            'terminal.created AS `terminal.created`',
            'terminal.updated AS `terminal.updated`',
            'terminal.name AS `terminal.name`',
            'terminal.ipAddress AS `terminal.ipAddress`',
            'terminal.hardwareId AS `terminal.hardwareId`',
            'terminal.softwareId AS `terminal.softwareId`',
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
            ->innerJoin('terminal', 'hardware', 'hardware', 'hardware.id = terminal.hardwareId')
            ->innerJoin('terminal', 'software', 'software', 'software.id = terminal.softwareId')
            ->innerJoin('terminal', 'network', 'network', 'network.id = terminal.networkId')
            ->where('player.username = :username')
            ->setParameter(':username', $username);

        $stmt = $qb->execute();
        $result = $stmt->fetch();

        $entityFields = array();
        foreach ($result as $key => $value) {
            list($entity, $field) = explode('.', $key);
            if (!isset($entityFields[$entity])) {
                $entityFields[$entity] = array();
            }
            $entityFields[$entity][$field] = $value;
        }

        $terminal = new TerminalModel;
        $this->modelMapper->map($terminal, $entityFields['terminal']);

        $network = new NetworkModel;
        $this->modelMapper->map($network, $entityFields['network']);
        $terminal->setNetwork($network);

        $hardware = new HardwareModel;
        $this->modelMapper->map($hardware, $entityFields['hardware']);
        $terminal->setHardware($hardware);

        $software = new SoftwareModel;
        $this->modelMapper->map($software, $entityFields['software']);
        $terminal->setSoftware($software);

        $player = new PlayerModel;
        $this->modelMapper->map($player, $entityFields['player']);
        $player->setTerminal($terminal);

        return $player;
    }
}
