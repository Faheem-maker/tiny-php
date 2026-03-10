<?php

namespace framework\db\commands;

use \framework\db\traits\HasTable;
use \framework\db\drivers\BaseDriver;

class SelectCommand extends BaseCommand
{
    use HasTable;
    protected array $cols;

    public function __construct(BaseDriver $driver, string|array $cols) {
        if (is_string($cols)) {
            $cols = explode(',', $cols);
        }

        $this->cols = $cols;
        parent::__construct($driver);
    }

    public function compile() {
        return $this->conn->compile('select', [
            'table' => $this->table,
            'cols' => $this->cols,
        ]);
    }

    public function all() {
        $sql = $this->compile();

        return $this->conn->execute($sql, [])->fetchAll();
    }
}