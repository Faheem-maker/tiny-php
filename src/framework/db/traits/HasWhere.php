<?php

namespace framework\db\traits;

trait HasWhere
{
    protected $where = [];

    public function where($condition, $params = [], $operator = 'AND')
    {
        $this->where[] = [
            'type' => 'condition',
            'operator' => $operator,
            'condition' => $condition,
        ];

        foreach ($params as $key => $value) {
            $this->params[$key] = $value;
        }

        return $this;
    }

    public function andWhere($condition, $params = [])
    {
        return $this->where($condition, $params, 'AND');
    }

    public function orWhere($condition, $params = [])
    {
        return $this->where($condition, $params, 'OR');
    }
}