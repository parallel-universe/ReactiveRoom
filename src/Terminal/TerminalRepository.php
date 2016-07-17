<?php
namespace ReactiveRoom\Terminal;

use Doctrine\DBAL\Connection;
use ReactiveRoom\ModelMapper;

class TerminalRepository
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

    public function findAllWithNetwork($networkId)
    {
        $fields = array(
            'terminal.id AS `id`',
            'terminal.created AS `created`',
            'terminal.updated AS `updated`',
            'terminal.name AS `nal.name`',
            'terminal.ipAddress AS `ipAddress`',
            'terminal.networkId AS `networkId`',
        );

        $qb = $this->conn->createQueryBuilder();
        $qb->select($fields)
            ->from('terminal', 'terminal')
            ->where('terminal.networkId = :networkId')
            ->setParameter(':networkId', $networkId);

        $stmt = $qb->execute();
        $result = $stmt->fetchAll();

        $terminals = array();
        foreach ($result as $row) {
            $terminalModel = new TerminalModel;
            $this->modelMapper->map($terminalModel, $row);
            $terminals[] = $terminalModel;
        }

        return $terminals;
    }
}
