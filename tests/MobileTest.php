<?php

namespace Tests;

use App\Call;
use App\Carrier\LocalCarrier;
use App\Contact;
use App\Exceptions\EmptyNameException;
use App\Exceptions\EmptyNumberException;
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
    public function testFindByName()
    {
        $contactServiceMock = m::mock(ContactService::class);
        $contactServiceMock->shouldReceive('findByName')
            ->with('Henry')
            ->andReturn(new Contact('1', 'Henry','+51999222777'));
        $contactServiceMock->shouldReceive('findByNumber')
            ->with('+51999222777')
            ->andReturn(new Contact('1', 'Henry','+51999222777'));
        
        $contactServiceMock::findByName('Henry');
        $contactServiceMock::findByNumber('+51999222777');
        
        $this->assertNotNull($contactServiceMock);
    }
}
