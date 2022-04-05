<?php

declare(strict_types=1);

namespace App\Calendar\Domain\ValueObjects;

final class CalendarName
{
    public function __construct(
        private string $name
    ) {
    }

    public function value(): string
    {
        return $this->name;
    }
}
