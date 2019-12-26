<?php

namespace App\PDO\Models\Person;

class PersonEntity
{
    private $name;
    private $age;
    private $email;

    public function __construct(string $name, int $age, string $email)
    {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getAge() : int
    {
        return $this->age;
    }

    public function getEmail() : string
    {
        return $this->email;
    }
}
