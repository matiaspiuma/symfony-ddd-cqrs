<?php

declare(strict_types=1);

namespace App\Calendar\Domain;

interface CalendarRepository
{
    public function findAll(): array;

    public function create(Calendar $calendar): void;
}
