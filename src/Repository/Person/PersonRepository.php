<?php

namespace App\PDO\Repository\Person;

use App\PDO\Config\IConnection;
use App\PDO\Models\Person\PersonEntity;

class PersonRepository
{
    private $connection;

    public function setConnection(IConnection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    private function getConnection()
    {
        return $this->connection;
    }

    public function getPessoas()
    {
        $query = "SELECT nome, age, email FROM pessoas";
        $conn = self::getConnection();
        $result = $conn->query($query);
        $people = $result->fetchAll();
        return $people;
    }

    public function setPerson(PersonEntity $person)
    {
        if (!self::getPersonByEmail($person->getEmail())) {
            $query = "INSERT INTO 
                        pessoas (nome, age, email) 
                    VALUES 
                        (:nome, :age, :email)";
            $conn = self::getConnection();
            $result = $conn->prepare($query);
            $result->execute([
                    ':nome' => "{$person->getName()}",
                    ':age' => "{$person->getAge()}",
                    ':email' => "{$person->getEmail()}"
                ]);
            return true;
        }
        return false;
    }

    private function getPersonByEmail(string $email) {
        $query = "SELECT email FROM pessoas WHERE email = :email";
        $conn = self::getConnection();
        $result = $conn->prepare($query);
        $result->execute(
            [
                ':email' => "{$email}"
            ]
        );
        $pessoa = $result->fetch(\PDO::FETCH_ASSOC);
        if ($pessoa['email'] === $email) {
            return true;
        }
        return false;
    }
}
