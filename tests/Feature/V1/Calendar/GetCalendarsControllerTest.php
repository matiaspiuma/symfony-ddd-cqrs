<?php

namespace App\Tests\Feature\V1\Calendar;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Messenger\MessageBusInterface;

class GetCalendarsControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $busMock = $this->createMock(MessageBusInterface::class);
        $busMock->method('dispatch')
            ->with($this->anything());
            
        static::createClient()->request('GET', '/api/v1/calendars');

        $this->assertResponseIsSuccessful();
    }
}
