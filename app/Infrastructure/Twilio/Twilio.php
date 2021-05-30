<?php


namespace App\Infrastructure\Twilio;


use Configuration\Configuration;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class Twilio
{
    private $client;
    private $twilioConfig;

    /**
     * @throws ConfigurationException
     * @throws TwilioException
     */
    public function __construct()
    {
        $this->twilioConfig = Configuration::twilio();
        $this->client = new Client(
            $this->twilioConfig['account_sid'],
            $this->twilioConfig['auth_token']
        );
    }

    /**
     * @throws TwilioException
     */
    public function send(string $number, string $body): void
    {
        $this->client->messages->create(
            $number,
            [
                'from' => $this->twilioConfig['twilio_number'],
                'body' => $body
            ]
        );
    }

    public function __destruct()
    {
        unset($this->client);
        unset($this->twilioConfig);
    }
}