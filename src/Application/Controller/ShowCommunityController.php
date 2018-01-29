<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Controller\ErrorController;
use Application\Repository\CommunityRepository;
use Application\Exception\CommunityNotFoundException;

/**
 * Class ShowCommunityController
 * @package Community\Controller
 */
final class ShowCommunityController
{
    /**
     * @var CommunityRepository
     */
    private $communityRepository;

    /**
     * ShowCommunityController constructor.
     * @param CommunityRepository $communityRepository
     */
    public function __construct(CommunityRepository $communityRepository)
    {
        $this->communityRepository = $communityRepository;
    }

    /**
     * @return string
     */
    public function indexAction() : string
    {
        try {
            $community = $this->communityRepository->get($_GET['name'] ?? '');
            ob_start();
            include __DIR__.'/../../../views/details_community.phtml';
            return ob_get_clean();
        } catch (CommunityNotFoundException $exception) {
            return (new ErrorController($exception))->error404Action();
        }
    }
}
