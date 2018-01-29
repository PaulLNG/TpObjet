<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\MeetingController;
use Application\Repository\MeetingRepository;
use Psr\Container\ContainerInterface;

final class MeetingControllerFactory
{
    public function __invoke(ContainerInterface $container) : MeetingController
    {
        $meetingRepository = $container->get(MeetingRepository::class);
        return new MeetingController($meetingRepository);
    }
}
