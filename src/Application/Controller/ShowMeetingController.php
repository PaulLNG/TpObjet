<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Controller\ErrorController;
use Application\Repository\MeetingRepository;
use Application\Exception\MeetingNotFoundException;

final class ShowMeetingController
{
    /**
     * @var MeetingRepository
     */
    private $meetingRepository;

    public function __construct(MeetingRepository $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    public function indexAction() : string
    {
        try {
            $meetings = $this->meetingRepository->getMeetingFutur();
            ob_start();
            include __DIR__.'/../../../views/meeting.phtml';
            return ob_get_clean();
        } catch (MeetingNotFoundException $exception) {
            return (new ErrorController($exception))->error404Action();
        }
    }
}
