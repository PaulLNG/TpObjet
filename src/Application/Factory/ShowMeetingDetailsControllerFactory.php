<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\ShowMeetingDetailsController;
use Application\Repository\MeetingRepository;
use Application\Repository\UserRepository;
use Psr\Container\ContainerInterface;

final class ShowMeetingDetailsControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowMeetingDetailsController
    {
        $meetingRepository = $container->get(MeetingRepository::class);
        $userRepository = $container->get(UserRepository::class);

        return new ShowMeetingDetailsController($userRepository, $meetingRepository);
    }
}
