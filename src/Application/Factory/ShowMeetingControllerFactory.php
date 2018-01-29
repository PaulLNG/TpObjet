<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\ShowMeetingController;
use Application\Repository\MeetingRepository;
use Psr\Container\ContainerInterface;

final class ShowMeetingControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowMeetingController
    {
        $meetingRepository = $container->get(MeetingRepository::class);

        return new ShowMeetingController($meetingRepository);
    }
}
