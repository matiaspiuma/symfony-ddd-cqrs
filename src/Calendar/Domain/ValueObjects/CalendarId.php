<?php

declare(strict_types=1);

namespace App\Calendar\Domain\ValueObjects;

use Ramsey\Uuid\Uuid;

final class CalendarId
{
    public function __construct(
        private string $id
    ) {
        $this->validate($id);
    }

    public function value(): string
    {
        return $this->id;
    }

    private function validate(string $id): void
    {
        if (! Uuid::isValid($id)) {
            throw new \InvalidArgumentException('Calendar ID cannot be empty');
        }
    }
}
