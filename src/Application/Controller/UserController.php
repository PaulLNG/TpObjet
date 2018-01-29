<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Repository\UserRepository;

final class UserController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function indexAction() : string
    {
        
        $data = $this->userRepository->getMeetingsByUser($_GET['name'] ?? '');
        ob_start();
        include __DIR__.'/../../views/meeting_user.phtml';
        return ob_get_clean();
    }
}
