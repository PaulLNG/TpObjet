<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Repository\MeetingRepository;

final class MeetingController
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
//        die();
        $meetings = $this->meetingRepository->fetchAll();
        ob_start();
        include __DIR__.'/../../../views/meeting.phtml';
        return ob_get_clean();
    }
}
