<?php

namespace Tests;

use App\Contact;
use App\Exceptions\EmptyNameException;
use App\Exceptions\EmptyNumberException;
use App\Infrastructure\Carrier\LocalCarrier;
use App\Infrastructure\Carrier\TwilioCarrier;
use App\Mobile;
use App\Services\ContactService;
use App\Sms;
use Exception;
use Mockery as m;
use PHPUnit\Framework\TestCase;

final class MobileTest extends TestCase
{
    /** @test
     * @throws EmptyNameException
     */
    public function it_returns_null_when_name_empty()
    {
        $provider = new LocalCarrier();

        $mobile = new Mobile($provider);

        $this->assertNull($mobile->makeCallByName('Henry'));
    }

    /**
     * @throws EmptyNumberException
     */
    public function testSendSmsLocalCarrier()
    {
        $provider = new LocalCarrier();

        $mobile = new Mobile($provider);

        $this->assertNull($mobile->sendSmsToNumber('+51999222777', new Sms('Hello there!')));
    }

    /**
     * @throws Exception
     */
    public function testContactService()
    {
        $contactServiceMock = m::mock(ContactService::class);
        $contactServiceMock->shouldReceive('findByName')
            ->with('Henry')
            ->andReturn(new Contact('1', 'Henry', '+51999222777'));
        $contactServiceMock->shouldReceive('findByNumber')
            ->with('+51999222777')
            ->andReturn(new Contact('1', 'Henry', '+51999222777'));
        $contactServiceMock->shouldReceive('validateNumber')
            ->with('+51999222777d')
            ->andReturn(true);

        $contactServiceMock::findByName('Henry');
        $contactServiceMock::findByNumber('+51999222777');
        $contactServiceMock::validateNumber('+51999222777d');

        $this->assertNotNull($contactServiceMock);
    }

    /**
     * @throws EmptyNumberException
     */
    public function testSendSmsTwilioCarrier()
    {
        $body = 'Hello there!';

        $provider = new TwilioCarrier();

        $mobile = new Mobile($provider);

        $this->assertEquals(
            $mobile->sendSmsToNumber('+51950433380', new Sms($body))->body(), $body
        );
    }

}
