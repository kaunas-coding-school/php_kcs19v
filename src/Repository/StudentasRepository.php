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
        $affected_rows = 0;
        foreach ($duomenys as $studentas) {
            $stmt = $this->manager->prepare(
                "INSERT INTO studentas(`vardas`,`pavarde`,`asmens_kodas`,`grupe`) 
                      VALUES(:vardas,:pavarde,:asmens_kodas,:grupe)"
            );
            $stmt->execute([
                ':vardas' => $studentas['vardas'],
                ':pavarde' => $studentas['pavarde'],
                ':asmens_kodas' => $studentas['ak'],
                ':grupe' => $studentas['grupe']
                ]);
            $affected_rows += $stmt->rowCount();
        }
        echo "Rows inserted: ".$affected_rows;
    }
}