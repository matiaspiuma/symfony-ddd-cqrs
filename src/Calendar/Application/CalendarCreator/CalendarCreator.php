<?php

declare(strict_types=1);

namespace App\Calendar\Application\CalendarCreator;

use App\Calendar\Domain\Calendar;
use App\Calendar\Domain\CalendarRepository;
use App\Calendar\Domain\ValueObjects\CalendarId;
use App\Calendar\Domain\ValueObjects\CalendarName;

final class CalendarCreator
{
    public function __construct(
        private $calendarRepository
    ) {
    }

    public function __invoke(
        CalendarId $id,
        CalendarName $name
    ) {
        $calendar = Calendar::create($id, $name);

        $this->calendarRepository->create($calendar);

        // $this->bus->publish(...$calendar->pullDomainEvents());
    }
}
