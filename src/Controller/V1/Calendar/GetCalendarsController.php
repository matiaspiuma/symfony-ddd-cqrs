<?php

declare(strict_types=1);

namespace App\Controller\V1\Calendar;

use App\Calendar\Application\CalendarFinder\GetAllCalendarsQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class GetCalendarsController extends AbstractController
{
    public function __invoke(MessageBusInterface $messageBus): JsonResponse
    {
        $calendars = $messageBus->dispatch(new GetAllCalendarsQuery());

        return new JsonResponse(
            data: $calendars,
            status: Response::HTTP_OK
        );
    }
}
