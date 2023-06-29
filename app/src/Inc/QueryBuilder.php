<?php

namespace App\Inc;

use PDO;

class QueryBuilder {

    private PDO $pdo;
    private string $table;
    private array $columns = ['*'];
    private array $where = [];
    private array $params = [];
    private string $orderBy = '';
    private string $limit = '';
    private string $joins = '';

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function table($table): QueryBuilder
    {
        $this->table = $table;
        return $this;
    }

    public function select($columns = ['*']): QueryBuilder
    {
        $this->columns = $columns;
        return $this;
    }

    public function addWhere($where, $params = []): QueryBuilder
    {
        $this->where[] = $where;
        $this->params = array_merge($this->params, $params);
        return $this;
    }

    public function orderBy($orderBy): QueryBuilder
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    public function limit($limit): QueryBuilder
    {
        $this->limit = $limit;
        return $this;
    }

    public function join($table, $on, $type = ''): QueryBuilder
    {
        $this->joins .= " $type JOIN $table ON $on";
        return $this;
    }

    public function getAssoc(): bool|array
    {
        return $this->execute()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getObject(string $className)
    {
        return $this->execute()->fetchObject($className);
    }

    public function getObjects(string $className): bool|array
    {
        return $this->execute()->fetchAll(PDO::FETCH_CLASS, $className);
    }

    public function insert($data): int
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $values = array_values($data);
        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);
        return $this->pdo->lastInsertId();
    }

    public function update($data)
    {
        $set = '';
        $values = [];
        foreach ($data as $key => $value) {
            $set .= "$key=?,";
            $values[] = $value;
        }
        $set = rtrim($set, ',');
        $sql = "UPDATE $this->table SET $set";
        if (!empty($this->where)) {
            $sql .= $this->getWhere();
        }
        $values = array_merge($values, $this->params);
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($values);
    }

    public function delete(): bool
    {
        $sql = "DELETE FROM $this->table";
        if ($this->where !== '') {
            $sql .= " WHERE $this->where";
        }
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($this->params);
    }

    private function getWhere(): string
    {
        $result = '';
        $first = true;
        foreach ($this->where as $where) {
            if ($first) {
                $result .= ' WHERE ' . $where;
                $first = false;
                continue;
            }
            $result .= ' AND ' . $where;
        }
        return $result;
    }

    private function execute(): bool|\PDOStatement
    {
        $sql = 'SELECT ' . implode(',', $this->columns) . ' FROM ' . $this->table;
        if (!empty($this->where)) {
            $sql .= $this->getWhere();
        }
        if ($this->orderBy !== '') {
            $sql .= ' ORDER BY ' . $this->orderBy;
        }
        if ($this->limit !== '') {
            $sql .= ' LIMIT ' . $this->limit;
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($this->params);

        return $stmt;
    }

}
