<?php

declare(strict_types=1);

namespace App\Calendar\Domain;

use App\Calendar\Domain\ValueObjects\CalendarId;
use App\Calendar\Domain\ValueObjects\CalendarName;

final class Calendar
{
    public function __construct(
        private CalendarId $id,
        private CalendarName $name
    ) {
    }

    public static function create(
        CalendarId $id,
        CalendarName $name,
    ): Calendar {
        $calendar = new self($id, $name);

        // $calendar->record(
        //     new CalendarCreatedDomainEvent(
        //         $id->value(),
        //         $name->value()
        //     )
        // );

        return $calendar;
    }

    public function id(): CalendarId
    {
        return $this->id;
    }

    public function name(): CalendarName
    {
        return $this->name;
    }
}
