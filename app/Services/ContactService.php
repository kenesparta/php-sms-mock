<?php

namespace App\Services;

use App\Contact;
use App\Infrastructure\Data\Data;
use App\Number;
use Exception;


class ContactService
{

    /**
     * @throws Exception
     */
    public static function findByName(string $name): Contact
    {
        $contact = Data::findOne($name, 'name');
        if (empty($contact)) {
            throw new Exception('Name not found');
        }
        return new Contact(
            $contact['id'],
            $contact['name'],
            $contact['number'],
        );
    }

    /**
     * @throws Exception
     */
    public static function findByNumber(string $number): Contact
    {
        $contact = Data::findOne($number, 'number');
        if (empty($contact)) {
            throw new Exception('Number not found');
        }
        return new Contact(
            $contact['id'],
            $contact['name'],
            $contact['number'],
        );
    }

    /**
     * @throws Exception
     */
    public static function validateNumber(string $number): bool
    {
        $number = new Number($number);
        $number->setPattern();
        return $number->isValid();
    }
}