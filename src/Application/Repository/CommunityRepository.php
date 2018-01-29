<?php


declare(strict_types=1);

namespace Application\Repository;


use Application\Collection\CommunityCollection;
use Application\Entity\Community;
use Application\Exception\CommunityNotFoundException;
use PDO;

/**
 * Class CommunityRepository
 * @package Community\Repository
 */
final class CommunityRepository
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * CommunityRepository constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return CommunityCollection
     */
    public function fetchAll() : CommunityCollection
    {

        $result = $this->pdo->query('SELECT id, name FROM communities');


        $communities = [];
        while ($community = $result->fetch()) {
            $communities[] = new Community($community['name']);
        }

        return new CommunityCollection(...$communities);
    }

    /**
     * @param string $name
     * @return Community
     */
    public function get(string $name) : Community
    {
        $statement = $this->pdo->prepare('SELECT id, name  FROM communities WHERE name = :name');
        $statement->execute([':name' => $name]);
        $community = $statement->fetch();
        if (!$community) {
            throw new CommunityNotFoundException();
        }
        return new Community($community['name']);
    }
}
