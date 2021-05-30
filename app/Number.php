<?php

namespace App;

class Number
{

    private string $pattern;
    private string $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }


    /**
     * Obtain the pattern from source like a DB or setting the custom validate phone number pattern
     * @param string $pattern
     */
    public function setPattern(string $pattern): void
    {
        $this->pattern = $pattern;
    }

    public function isValid(): bool
    {
        return true;
    }
}