<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\ShowMeetingsByCommunityController;
use Application\Repository\MeetingRepository;
use Psr\Container\ContainerInterface;

final class ShowMeetingsByCommunityControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowMeetingsByCommunityController
    {
        $meetingRepository = $container->get(MeetingRepository::class);

        return new ShowMeetingsByCommunityController($meetingRepository);
    }
}
