<?php

declare(strict_types=1);

require __DIR__."/../vendor/autoload.php";

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));


try {

    $stud = (new \KCS\Repository\StudentasRepository())->getAllStudents();

} catch (\Exception $e){
    $log->addWarning($e->getMessage());
}