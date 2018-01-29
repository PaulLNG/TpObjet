<?php
declare(strict_types = 1);
namespace Application\Repository;

use Application\Collection\MeetingCollection;
use Application\Entity\Meeting;
use Application\Exception\MeetingNotFoundException;
use PDO;

/**
 * Class MeetingRepository
 *
 * @package Meetup\Repository
 */
final class MeetingRepository
{

    /**
     *
     * @var PDO
     */
    private $pdo;

    /**
     * MeetingRepository constructor.
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     *
     * @return MeetingCollection
     */
    public function fetchAll(): MeetingCollection
    {
        $result = $this->pdo->query('SELECT id, title, description, date_start, date_end FROM meetings');
        
        $meetings = [];
        while ($meeting = $result->fetch()) {
            $meetings[] = new Meeting($meeting['title'], $meeting['description'], new \DateTimeImmutable($meeting['date_end']), new \DateTimeImmutable($meeting['date_start']));
        }
        
        return new MeetingCollection(...$meetings);
    }

    /**
     *
     * @param string $name
     * @return Meeting
     */
    public function getByName(string $name): Meeting
    {
        $statement = $this->pdo->prepare('SELECT id, title, description, date_start, date_end  FROM meetings WHERE title = :name');
        $statement->execute([
            ':name' => $name
        ]);
        $meeting = $statement->fetch();
        if (! $meeting) {
            throw new MeetingNotFoundException();
        }
        return new Meeting($meeting['title'], $meeting['description'], new \DateTimeImmutable($meeting['date_end']), new \DateTimeImmutable($meeting['date_start']));
    }

    /**
     *
     * @param string $meetingId
     * @return Meeting
     */
    public function getById(string $meetingId): Meeting
    {
        $statement = $this->pdo->prepare('SELECT id, title, description, date_start, date_end  FROM meetings WHERE id = :meetingId');
        $statement->execute([
            ':meetingId' => $meetingId
        ]);
        $meeting = $statement->fetch();
        if (! $meeting) {
            throw new MeetingNotFoundException();
        }
        return new Meeting($meeting['title'], $meeting['description'], new \DateTimeImmutable($meeting['date_end']), new \DateTimeImmutable($meeting['date_start']));
    }

    public function getMeetingFutur(): MeetingCollection
    {
        $result = $this->pdo->query('SELECT id, title, description, date_start, date_end FROM meetings WHERE date_end >= NOW()');
        
        $meetings = [];
        while ($meeting = $result->fetch()) {
            $meetings[] = new Meeting($meeting['title'], $meeting['description'], new \DateTimeImmutable($meeting['date_end']), new \DateTimeImmutable($meeting['date_start']));
        }
        return new MeetingCollection(...$meetings);
    }

    /**
     *
     * @param string $communityId
     * @return MeetingCollection
     */
    public function getMeetingsByCommunity(string $communityId): MeetingCollection
    {
        $statement = $this->pdo->prepare('SELECT title, description, date_start as dateStart, date_end as dateEnd FROM meetings WHERE community_id = :communityId;');
        $statement->execute([
            ':communityId' => $communityId
        ]);
        $meetings = [];
        while ($meeting = $statement->fetch()) {
            $meetings[] = new Meeting($meeting['title'], $meeting['description'], new \DateTimeImmutable($meeting['dateStart']), new \DateTimeImmutable($meeting['dateEnd']));
        }
        
        return new MeetingCollection(...$meetings);
    }
}
