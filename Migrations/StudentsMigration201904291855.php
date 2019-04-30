<?php

declare(strict_types=1);

require __DIR__."/../vendor/autoload.php";

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));


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

    $studentasRepository = new \KCS\Repository\StudentasRepository();
    $studentasRepository->importStudents($duomenys);

    $stud = ($studentasRepository)->getAllStudents();
var_dump($stud);
} catch (\Exception $e){
    $log->addWarning($e->getMessage());
}