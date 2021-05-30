<?php


namespace App\Infrastructure\Carrier;


use App\Call;
use App\Contact;
use App\Exceptions\DialException;
use App\Infrastructure\Twilio\Twilio;
use App\Interfaces\CarrierInterface;
use App\Services\ContactService;
use App\Sms;
use Exception;
use Twilio\Exceptions\TwilioException;

class TwilioCarrier implements CarrierInterface
{
    private $contact;

    /**
     * @throws DialException
     * @throws Exception
     */
    public function dialContact(Contact $contact)
    {
        $this->contact = $contact;
        if (!ContactService::validateNumber($this->contact->number())) {
            throw new DialException('The number does not correct');
        }
    }

    public function makeCall(): ?Call
    {
        return Null;
    }

    /**
     * @throws TwilioException
     */
    public function sendSms(Sms $sms): ?Sms
    {
        $twilio = new Twilio();
        $twilio->send($this->contact->number(), $sms->body());
        return $sms;
    }
}