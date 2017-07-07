<?php


namespace SkyCentrics\Cloud\DTO;

use SkyCentrics\Cloud\Annotation\Property;


/**
 * Class CloudGroup
 * @package SkyCentrics\Cloud\DTO
 */
class CloudGroup implements CloudDTOInterface
{
    /**
     * @var int
     *
     * @Property(key="i")
     */
    protected $id;

    /**
     * @var string
     *
     * @Property(key="n")
     */
    protected $name;

    /**
     * @var int
     *
     * @Property(key="u")
     */
    protected $userId;

    /**
     * @var int
     *
     * @Property(key="p")
     */
    protected $parent;

    /**
     * @var int
     *
     * @Property(key="t")
     * @TODO: it is a temp property's name is needed for mapping
     */
    protected $target = 0;

    /**
     * CloudGroup constructor.
     * @param string $name
     * @param int $userId
     * @param int $parent
     */
    public function __construct(string $name, int $userId, int $parent = 0)
    {
        $this->id = 0;
        $this->name = $name;
        $this->userId = $userId;
        $this->parent = $parent;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getParent(): int
    {
        return $this->parent;
    }

    /**
     * @param int $parent
     */
    public function setParent(int $parent)
    {
        $this->parent = $parent;
    }
}