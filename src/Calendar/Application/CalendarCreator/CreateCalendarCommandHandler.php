<?php

declare(strict_types=1);

namespace App\Calendar\Application\CalendarCreator;

use App\Calendar\Domain\ValueObjects\CalendarId;
use App\Calendar\Domain\ValueObjects\CalendarName;

final class CreateCalendarCommandHandler
{
    public function __construct(
        private CalendarCreator $calendarCreator
    ) {
    }

    public function __invoke(CreateCalendarCommand $command): void
    {
        $this->calendarCreator->__invoke(
            new CalendarId($command->id()),
            new CalendarName($command->name())
        );
    }
}
