<?php

namespace App;

use Exception;

final class Number
{
    private const DEFAULT_PATTERN = '^\+51\d{9}$';

    private $pattern;
    private $number;


    public function __construct(string $number)
    {
        $this->number = $number;
    }

    /**
     * Obtain the pattern from source like a DB or setting the custom validate phone number pattern
     * @param string $pattern
     */
    public function setPattern(string $pattern = self::DEFAULT_PATTERN): void
    {
        $this->pattern = $pattern;
    }

    /**
     * Validate the phone number according to the given pattern
     * @return bool
     * @throws Exception
     */
    public function isValid(): bool
    {
        if ($this->pattern == '') {
            throw new Exception('Pattern must be created!');
        }
        return boolval(preg_match("/{$this->pattern}/", $this->number));
    }
}