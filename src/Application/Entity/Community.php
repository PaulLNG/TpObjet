<?php


declare(strict_types=1);

namespace Application\Entity;


class Community
{

    /**
     * @var string
     */
    private $name;

    /**
     * Community constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }



}