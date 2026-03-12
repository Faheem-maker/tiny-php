<?php

namespace framework\db\commands;

use framework\db\traits\HasWhere;

class WhereCommand
{
    use HasWhere;

    protected array $params;

    public function __construct(array &$params)
    {
        $this->params = &$params;
    }

    public function getWhere(): array
    {
        return $this->where;
    }
}
