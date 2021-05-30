<?php


namespace App\Carrier;


use App\Contact;
use App\Call;
use App\Interfaces\CarrierInterface;

class LocalCarrier implements CarrierInterface
{

    public function dialContact(Contact $contact)
    {
        // TODO: Implement dialContact() method.
    }

    public function makeCall(): Call
    {
        // TODO: Implement makeCall() method.
    }
}