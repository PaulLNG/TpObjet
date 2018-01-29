<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\ShowUserController;
use Application\Repository\UserRepository;
use Psr\Container\ContainerInterface;

final class ShowUserControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowUserController
    {
        $userRepository = $container->get(UserRepository::class);

        return new ShowUserController($userRepository);
    }
}
