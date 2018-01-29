<?php

use Application\Controller\IndexController;
use Application\Controller\LecturerController;
use Application\Factory\DateTimeImmutableFactory;
use Application\Factory\DbConfigProviderFactory;
use Application\Factory\IndexControllerFactory;
use Application\Factory\LecturerControllerFactory;
use Application\Factory\LecturerRepositoryFactory;
use Application\Factory\ParseUriHelperFactory;
use Application\Factory\PdoConnectionFactory;
use Application\Factory\RouterFactory;
use Application\Provider\DbConfigProvider;
use Application\Repository\LecturerRepository;
use Application\Router\ParseUriHelper;
use Application\Router\Router;

use Application\Controller\MeetingController;
use Application\Controller\ShowMeetingController;
use Application\Factory\MeetingControllerFactory;
use Application\Factory\MeetingRepositoryFactory;
use Application\Factory\ShowMeetingControllerFactory;
use Application\Repository\MeetingRepository;
use Application\Controller\ShowMeetingsByCommunityController;
use Application\Factory\ShowMeetingsByCommunityControllerFactory;
use Application\Controller\ShowMeetingDetailsController;
use Application\Factory\ShowMeetingDetailsControllerFactory;

use Application\Controller\UserController;
use Application\Controller\ShowUserController;
use Application\Factory\UserControllerFactory;
use Application\Factory\UserRepositoryFactory;
use Application\Factory\ShowUserControllerFactory;
use Application\Repository\UserRepository;

use Application\Controller\CommunityController;
use Application\Factory\CommunityControllerFactory;
use Application\Factory\CommunityRepositoryFactory;
use Application\Repository\CommunityRepository;
use Application\Controller\ShowCommunityController;
use Application\Factory\ShowCommunityControllerFactory;



return [
    'factories' => [
        // Configuration du "framework applicatif"
        ParseUriHelper::class => ParseUriHelperFactory::class,
        Router::class => RouterFactory::class,
        PDO::class => PdoConnectionFactory::class,
        DbConfigProvider::class => DbConfigProviderFactory::class,

        // Configurations liés aux lecturers
        DateTimeInterface::class => DateTimeImmutableFactory::class,
        LecturerController::class => LecturerControllerFactory::class,
        IndexController::class => IndexControllerFactory::class,
        LecturerRepository::class => LecturerRepositoryFactory::class,

        // Configurations liés aux Meetings
        MeetingController::class => MeetingControllerFactory::class,
        MeetingRepository::class => MeetingRepositoryFactory::class,
        ShowMeetingController::class => ShowMeetingControllerFactory::class,
        ShowMeetingsByCommunityController::class=>ShowMeetingsByCommunityControllerFactory::class,
        ShowMeetingDetailsController::class => ShowMeetingDetailsControllerFactory::class,

        // Configurations liés aux User
        UserController::class => UserControllerFactory::class,
        UserRepository::class => UserRepositoryFactory::class,
        ShowUserController::class => ShowUserControllerFactory::class,

        CommunityController::class => CommunityControllerFactory::class,
        CommunityRepository::class => CommunityRepositoryFactory::class,
        ShowCommunityController::class => ShowCommunityControllerFactory::class,
    ],
];
