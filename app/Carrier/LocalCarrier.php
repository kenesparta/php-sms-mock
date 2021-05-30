<?php


namespace App\Carrier;


use App\Contact;
use App\Call;
use App\Exceptions\DialException;
use App\Interfaces\CarrierInterface;
use App\Services\ContactService;
use App\Sms;
use Exception;

class LocalCarrier implements CarrierInterface
{
    /**
     * @throws Exception
     */
    public function dialContact(Contact $contact)
    {
        if (!ContactService::validateNumber($contact->number())) {
            throw new DialException('The number does not correct');
        }
        // TODO: Implement other dialContact() logic.
    }

    public function makeCall(): ?Call
    {
        // TODO: Implement other makeCall() logic.
        return Null;
    }

    public function sendSms(Sms $sms): ?Sms
    {
        // TODO: Implement other sendSms() logic.
        return Null;
    }
}