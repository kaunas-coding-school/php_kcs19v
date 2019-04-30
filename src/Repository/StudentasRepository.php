<?php

declare(strict_types=1);

namespace KCS\Repository;


use KCS\Model\Studentas;
use KCS\Service\DataBaseManager;

class StudentasRepository
{
    private $manager;

    public function __construct()
    {
        $this->manager = (new DataBaseManager())->getConection();
    }

    public function getAllStudents(): array
    {
        $stmt = $this->manager->query("SELECT * FROM studentas");

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function importStudents(array $duomenys): void
    {
        foreach ($duomenys as $studentas) {
            //...
        }
    }
}