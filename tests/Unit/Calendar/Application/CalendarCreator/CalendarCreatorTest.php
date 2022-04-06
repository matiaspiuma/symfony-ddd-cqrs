<?php

declare(strict_types=1);

namespace App\Tests\Unit\Calendar\Application\CalendarCreator;

use App\Calendar\Application\CalendarCreator\CalendarCreator;
use App\Calendar\Domain\Calendar;
use App\Calendar\Domain\ValueObjects\CalendarId;
use App\Calendar\Domain\ValueObjects\CalendarName;
use App\Repository\CalendarRepository;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use Ramsey\Uuid\Uuid;

final class CalendarCreatorTest extends MockeryTestCase
{
    private CalendarRepository|MockInterface|null  $repository;

    private CalendarCreator $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new CalendarCreator($this->repository());
    }

    /** @test */
    public function it_should_create_an_calendar(): void
    {
        $calendar = Calendar::create(
            id: new CalendarId(
                id: Uuid::uuid4()->toString()
            ),
            name: new CalendarName(
                name: 'My Calendar'
            )
        );

        $this->repository()
            ->shouldReceive('create')
            ->with(Mockery::on(function ($arg) use ($calendar) {
                return $arg->id() === $calendar->id();
            }))
            ->once()
            ->andReturnNull();

        $this->creator->__invoke(
            id: $calendar->id(),
            name: $calendar->name()
        );
    }

    private function repository(): CalendarRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(CalendarRepository::class);
    }

    private function mock(string $className): MockInterface|LegacyMockInterface
    {
        return Mockery::mock($className);
    }
}
