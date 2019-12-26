<?php

error_reporting(E_ALL);

require_once __DIR__ . '/autoload.php';

use App\PDO\Config\MySQL;
use App\PDO\Config\Postgres;
use App\PDO\Models\Person\PersonEntity;
use App\PDO\Repository\Person\PersonRepository;

$mysql = new MySQL();
$pgsql = new Postgres();

$pessoa = new PersonEntity('Andre Ferreira', 34, 'andre.ferreira@soluti.com.br');

$pessoas = new PersonRepository();
$pessoas->setConnection($pgsql);

if ($pessoas->setPerson($pessoa)) {
    print("Pessoa cadastrada com sucesso") . PHP_EOL;
} else {
    print("Email já utilizado") . PHP_EOL;
}

$listPessoas = $pessoas->getPessoas();


foreach ($listPessoas as $person) {
    print("Name..: " . $person['nome']) . PHP_EOL;
    print("Age...: " . $person['age']) . PHP_EOL;
    print("E-mail: " . $person['email']) . PHP_EOL;
    print "\n";
}