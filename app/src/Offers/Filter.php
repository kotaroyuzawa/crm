<?php

namespace App\Offers;

class Filter {

    private string $where;

    private array $params;

    /**
     * @param string $where
     */
    public function setWhere(string $where): void
    {
        $this->where = $where;
    }

    /**
     * @return string
     */
    public function getWhere(): string
    {
        return $this->where;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
}