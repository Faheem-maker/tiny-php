<?php

namespace framework\db;

use framework\db\commands\SelectCommand;
use framework\db\drivers\BaseDriver;
use framework\web\interfaces\Component;

class QueryBuilder extends Component
{
    protected BaseDriver $conn;

    public function __construct(BaseDriver $conn)
    {
        $this->conn = $conn;
    }

    public function init(): void
    {
        $this->conn->connect();
    }

    public function select($cols = '*')
    {
        return new SelectCommand($this->conn, $cols);
    }
}