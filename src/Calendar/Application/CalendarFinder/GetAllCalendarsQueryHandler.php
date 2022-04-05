<?php

declare(strict_types=1);

namespace App\Calendar\Application\CalendarFinder;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class GetAllCalendarsQueryHandler
{
    public function __construct(
        private CalendarFinder $finder
        )
    {
    }

    public function __invoke(GetAllCalendarsQuery $getAllCalendarsQuery): array
    {
        return $this->finder->findAll();
    }
}
