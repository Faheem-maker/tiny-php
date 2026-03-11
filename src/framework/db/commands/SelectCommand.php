<?php

namespace framework\db\commands;

use \framework\db\traits\HasTable;
use \framework\db\drivers\BaseDriver;
use framework\db\traits\HasWhere;

class SelectCommand extends BaseCommand
{
    protected array $cols;
    protected array $params = [];

    use HasTable;
    use HasWhere;

    public function __construct(BaseDriver $driver, string|array $cols)
    {
        if (is_string($cols)) {
            $cols = explode(',', $cols);
        }

        $this->cols = $cols;
        parent::__construct($driver);
    }

    public function compile()
    {
        return $this->conn->compile('select', [
            'table' => $this->table,
            'cols' => $this->cols,
            'condition' => $this->where,
            'where' => $this->where,
        ]);
    }

    public function all()
    {
        $sql = $this->compile();

        return $this->conn->execute($sql, $this->params)->fetchAll();
    }
}