<?php

declare(strict_types=1);

namespace KCS\Service;

class DataBaseManager
{
    private $con;

    public function __construct()
    {
        $dbName = $this->getDbName();
        $dbUserName = $this->getDbUserName();
        $dbPass = $this->getDbPass();

        if (!isset($this->con) || $this->con instanceof \PDO) {
            $this->con = new \PDO("mysql:host=localhost;port=3306;dbname=$dbName;charset=utf8mb4", $dbUserName, $dbPass);
        }
        return $this->con;
    }

    private function getDbName(): string
    {
        return 'kcs19v';
    }

    private function getDbUserName(): string
    {
        return 'root';
    }

    private function getDbPass(): string
    {
        return '';
    }

    public function getConection(): \PDO
    {
        return $this->con;
    }
}