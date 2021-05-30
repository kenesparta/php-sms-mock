<?php

namespace App;

use App\Exceptions\EmptyNameException;
use App\Exceptions\EmptyNumberException;
use App\Interfaces\CarrierInterface;
use App\Services\ContactService;
use Exception;


class Mobile
{
    protected $provider;

    function __construct(CarrierInterface $provider)
    {
        $this->provider = $provider;
    }


    /**
     * @throws EmptyNameException
     * @throws Exception
     */
    public function makeCallByName($name = ''): ?Call
    {
        if (empty($name)) throw new EmptyNameException('The name should not be empty');

        $contact = ContactService::findByName($name);

        $this->provider->dialContact($contact);

        return $this->provider->makeCall();
    }

    /**
     * @throws EmptyNumberException
     * @throws Exception
     */
    public function sendSmsToNumber(string $number, Sms $sms): ?Sms
    {
        if (empty($number)) throw new EmptyNumberException('The number should not be empty');

        $contact = ContactService::findByNumber($number);

        $this->provider->dialContact($contact);

        return $this->provider->sendSms($sms);
    }
}
