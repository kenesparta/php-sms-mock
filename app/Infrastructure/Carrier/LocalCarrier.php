<?php


namespace App\Infrastructure\Carrier;


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
     * @var Contact
     */
    private $contact;

    /**
     * @throws Exception
     */
    public function dialContact(Contact $contact)
    {
        $this->contact = $contact;
        if (!ContactService::validateNumber($this->contact->number())) {
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