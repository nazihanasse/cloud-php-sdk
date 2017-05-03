<?php


namespace SkyCentrics\Cloud\DTO;


/**
 * Class CloudGroup
 * @package SkyCentrics\Cloud\DTO
 */
class CloudGroup implements CloudDTOInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $parent;

    /**
     * CloudGroup constructor.
     * @param string $name
     * @param int $userId
     * @param int $parent
     */
    public function __construct(string $name, int $userId, int $parent = 0)
    {
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