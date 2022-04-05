<?php

declare(strict_types=1);

namespace App\Calendar\Infrastructure;

use App\Calendar\Domain\Calendar as DomainCalendar;
use App\Calendar\Domain\CalendarRepository;
use App\Entity\Calendar;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineCalendarRepository implements CalendarRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->entityManager = $doctrine->getManager();
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Calendar::class)->findAll();
    }

    public function create(DomainCalendar $calendar): void
    {
        $this->entityManager->persist(
            entity: $calendar
        );
        $this->entityManager->flush();
    }
}
