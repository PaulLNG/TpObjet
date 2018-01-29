<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\CommunityController;
use Application\Repository\CommunityRepository;
use Psr\Container\ContainerInterface;

/**
 * Class CommunityControllerFactory
 * @package Community\Factory
 */
final class CommunityControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return CommunityController
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container) : CommunityController
    {
        $communityRepository = $container->get(CommunityRepository::class);
        return new CommunityController($communityRepository);
    }
}
