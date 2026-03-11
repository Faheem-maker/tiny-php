<?php

namespace framework\db\drivers;

use Exception;
use framework\db\QueryResult;
use PDO;

class MySqlDriver extends BaseDriver
{
    protected $conn;

    protected function getDsn(): string
    {
        $dsn = "mysql:host={$this->config['host']};dbname={$this->config['database']}";

        if (isset($this->config['port'])) {
            $dsn .= ";port={$this->config['port']}";
        }

        return $dsn;
    }

    public function connect(): void
    {
        $this->conn = new \PDO($this->getDsn(), $this->config['username'], $this->config['password']);
    }

    public function disconnect(): void
    {
        $this->conn = null;
    }

    public function compile(string $type, array $components): string
    {
        switch ($type) {
            case 'select':
                return $this->compileSelect($components);
            default:
                throw new Exception("Unsupported query type: {$type}");
        }
    }

    protected function compileSelect(array $components): string
    {
        $cols = implode(', ', $components['columns'] ?? ['*']);
        $query = "SELECT {$cols} FROM {$components['table']}";

        foreach ($components['joins'] as $join) {
            $query .= " {$join['type']} JOIN {$join['table']} ON {$join['condition']}";
        }

        $query .= ' WHERE 1 = 1';

        foreach ($components['where'] as $cond) {
            $query .= " {$cond['operator']} {$cond['condition']}";
        }

        return $query;
    }

    public function execute(string $sql, array $params = []): QueryResult
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return new MySqlResult($stmt);
    }
}