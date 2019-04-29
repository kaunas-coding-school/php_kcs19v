<?php

declare(strict_types=1);

require __DIR__."/vendor/autoload.php";

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));

const VYRAI = [3, 5];
const MOTERYS = [4, 6];

function spausdintiDuomenis($studentai): void
{
    foreach ($studentai as $studentas) {
        /** @var Studentas $studentas */
        echo $studentas->getPavarde() . " a.k.: " . $studentas->getAk() . " [" . $studentas->getGrupe() . "]<br>";
    }
}
function pildytiDuomenis($duomenys): array
{
    $studentai = [];

    foreach ($duomenys as $asmuo) {
        $stud = new KCS\Model\Studentas();
        $stud->setVardas($asmuo['vardas']);
        $stud->setPavarde($asmuo['pavarde']);
        $stud->setGrupe((new KCS\Model\Grupe())->setPavadinimas($asmuo['grupe']));
        $stud->setAk((string)$asmuo['ak']);
        $studentai[] = $stud;
    }
    return $studentai;
}
function gautiPagalLyti(array $studentai, array $lytis): array
{
    /** @var Studentas $studentas */
    foreach ($studentai as $studentas) {
        if (in_array($studentas->getAk()[0], $lytis)) {
            $naujiStudentai[] = $studentas;
        }
    }

    return $naujiStudentai;
}

try {
    $duomenys = [
        ['vardas' => "jonas", "pavarde" => "Jonaitis1", "grupe" => "KCS19V", "ak" => 31234567890,],
        ['vardas' => "jonas2", "pavarde" => "Jonaitis2", "grupe" => "KCS19V", "ak" => 41234567890,],
        ['vardas' => "jonas3", "pavarde" => "Jonaitis3", "grupe" => "KCS19V", "ak" => 41234567890,],
        ['vardas' => "jonas4", "pavarde" => "Jonaitis4", "grupe" => "KCS19V", "ak" => 41234567890,],
        ['vardas' => "jonas5", "pavarde" => "Jonaitis5", "grupe" => "KCS20V", "ak" => 31234567890,],
        ['vardas' => "jonas6", "pavarde" => "Jonaitis6", "grupe" => "KCS19V", "ak" => "41W234567890",],
        ['vardas' => "jonas7", "pavarde" => "Jonaitis7", "grupe" => "KCS19V", "ak" => 31234567890,],
        ['vardas' => "jonas8", "pavarde" => "Jonaitis8", "grupe" => "KCS19V", "ak" => 51234567890,],
        ['vardas' => "jonas9", "pavarde" => "Jonaitis9", "grupe" => "KCS19V", "ak" => 31234567890,],
        ['vardas' => "jonas10", "pavarde" => "Jonaitis10", "grupe" => "KCS19V", "ak" => "61234567890",],
    ];
    $studentai = pildytiDuomenis($duomenys);
    echo "Pradiniai Duomenys:<br>";
    spausdintiDuomenis($studentai);
    echo "<hr>";
    $vyrai = gautiPagalLyti($studentai, VYRAI);
    $moterys = gautiPagalLyti($studentai, MOTERYS);
    echo "Vyrai:<br>";
    spausdintiDuomenis($vyrai);
    echo "<hr>";
    echo "Moterys:<br>";
    spausdintiDuomenis($moterys);
    echo "<hr>";


    $stud = (new \KCS\Repository\StudentasRepository())->getAllStudents();
    foreach ($stud as $item) {
        echo $item['vardas']."<br>";
    }
} catch (\Exception $e){
    $log->addWarning($e->getMessage());
}