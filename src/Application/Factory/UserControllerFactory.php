<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\UserController;
use Application\Repository\UserRepository;
use Psr\Container\ContainerInterface;

final class UserControllerFactory
{
    public function __invoke(ContainerInterface $container) : UserController
    {
        $userRepository = $container->get(UserRepository::class);
        return new UserController($userRepository);
    }
}
