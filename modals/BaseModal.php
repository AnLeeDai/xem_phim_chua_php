<?php

class BaseModal
{
    protected $table;
    protected $pdo;

    public function __construct()
    {
        $dsn = sprintf('mysql:host=%s;port=%d;dbname=%s;charset=utf8', DB_HOST, DB_PORT, DB_NAME);

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OPTIONS);
        } catch (PDOException $e) {
            die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function select($column = '*', $conditions = null, $params = [])
    {
        $sql = "SELECT {$column} FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE {$conditions}";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count($conditions = null, $params = [])
    {
        $sql = "SELECT COUNT(*) FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE {$conditions}";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchColumn();
    }

    public function pagination($page = 1, $perPage = 5, $column = '*', $conditions = null, $params = [])
    {
        $sql = "SELECT {$column} FROM {$this->table}";

        if ($conditions) {
            $sql .= "WHERE $conditions";
        }

        $offset = ($page - 1) * $perPage;
        $sql .= " LIMIT {$offset}, {$perPage}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($column = '*', $conditions = null, $params = [])
    {
        $sql = "SELECT {$column} FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE {$conditions}";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);


        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($conditions = null, $params = [])
    {
        $sql = "DELETE FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE {$conditions}";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->rowCount();
    }

    public function insert($data)
    {
        $keys = array_keys($data);

        $columns = implode(', ', $keys);
        $placeholders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);

        return $this->pdo->lastInsertId();
    }

    public function update($data, $conditions = null, $params = [])
    {
        $sets = implode(', ', array_map(fn($key) => "$key = :set_$key", array_keys($data)));

        $sql = "UPDATE {$this->table} SET $sets";

        if ($conditions) {
            $sql .= " WHERE {$conditions}";
        }

        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $key => &$value) {
            $stmt->bindParam(":set_$key", $value);
        }

        foreach ($params as $key => &$value) {
            $stmt->bindParam(":$key", $value);
        }

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
