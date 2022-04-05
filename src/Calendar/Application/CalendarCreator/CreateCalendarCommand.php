<?php

declare(strict_types=1);

namespace App\Calendar\Application\CalendarCreator;

final class CreateCalendarCommand
{
    public function __construct(
        private string $id,
        private string $name
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
