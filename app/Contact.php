<?php

namespace App;


class Contact
{
    private $id;

    private $name;

    private $number;

    function __construct(string $id, string $name, string $number)
    {
        $this->id = $id;
        $this->number = $number;        
        $this->name = $name;
    }

    public function number(): string
    {
        return $this->number;
    }
}