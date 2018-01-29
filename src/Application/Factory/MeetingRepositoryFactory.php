<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\MeetingRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class MeetingRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : MeetingRepository
    {
        $pdo = $container->get(PDO::class);

        return new MeetingRepository($pdo);
    }
}
