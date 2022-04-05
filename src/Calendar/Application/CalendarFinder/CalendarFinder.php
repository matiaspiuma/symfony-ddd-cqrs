<?php

declare(strict_types=1);

namespace App\Calendar\Application\CalendarFinder;

use App\Calendar\Domain\CalendarRepository;

final class CalendarFinder
{
    public function __construct(
        private CalendarRepository $calendarRepository
    ) {
    }

    public function findAll(): array
    {
        return $this->calendarRepository->findAll();
    }
}
