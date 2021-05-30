<?php


namespace App;


class Sms
{
    private $body;

    public function __construct(string $body)
    {
        $this->body = $body;
    }

    public function body(): string
    {
        return $this->body;
    }
}