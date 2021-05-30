<?php


namespace Tests;


use App\Number;
use Exception;
use PHPUnit\Framework\TestCase;

final class NumberTest extends TestCase
{
    /**
     * @covers \App\Number::isValid
     * @covers \App\Number::setPattern
     * @throws Exception
     */
    public function testReturnValidNumber()
    {
        $number = new Number('+51999888666');
        $number->setPattern();

        $this->assertTrue($number->isValid());
    }
}