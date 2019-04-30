<?php

declare(strict_types=1);

require __DIR__."/vendor/autoload.php";

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('/app.log', Monolog\Logger::WARNING));

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
        $stud->setAk((string)$asmuo['asmens_kodas']);
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
function renderStudents(array $data): void{
    /** @var \KCS\Model\Studentas $student */
    foreach ($data as $student) {
        if(!$student instanceof \KCS\Model\Studentas){
            throw new \Exception('Gautas irasas nera studentas');
        }
        echo "<div class='studentas'>
                <img src='/img/studentas.jpg' alt=''>
                <span>$student</span>
              </div>";
    }
}
try {
    $duomenys = (new \KCS\Repository\StudentasRepository())->getAllStudents();

    $studentai = pildytiDuomenis($duomenys);
    echo "Pradiniai Duomenys:<br>";
//    spausdintiDuomenis($studentai);
    echo "<hr>";
    $vyrai = gautiPagalLyti($studentai, VYRAI);
    $moterys = gautiPagalLyti($studentai, MOTERYS);
    echo "Vyrai:<br>".count($vyrai);
//    spausdintiDuomenis($vyrai);

    echo "<hr>";
    echo "Moterys:<br>".count($moterys);
//    spausdintiDuomenis($moterys);
    echo "<hr>";
    renderStudents($studentai);
} catch (\Exception $e){
    $log->addWarning($e->getMessage());
}