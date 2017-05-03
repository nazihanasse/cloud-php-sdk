<?php


namespace SkyCentrics\Cloud\DTO;

/**
 * Class AbstractCloudDevice
 * @package SkyCentrics\Cloud\DTO
 */
abstract class AbstractCloudDevice implements CloudDTOInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $groupId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var string
     */
    protected $mac;

    /**
     * @var int|null
     */
    protected $model;

    /**
     * AbstractCloudDevice constructor.
     * @param int $userId
     * @param string $name
     * @param int $type
     * @param string $mac
     * @param int|null $model
     */
    public function __construct(
        int $userId,
        string $name,
        int $type,
        string $mac,
        int $groupId = 0,
        int $model = 0
    )
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->type=  $type;
        $this->mac = $mac;
        $this->model = $model;
        $this->groupId = $groupId;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId() : int
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
     * @return string
     */
    public function getDeviceName() : string
    {
        return$this->name;
    }

    /**
     * @param string $name
     */
    public function setDeviceName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMac() : string
    {
        return $this->mac;
    }

    /**
     * @param string $mac
     */
    public function setMac(string $mac)
    {
        $this->mac = $mac;
    }

    /**
     * @return int
     */
    public function getDeviceType() : int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setDeviceType(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getDeviceModel() : int
    {
        return $this->model;
    }

    /**
     * @param int $model
     */
    public function setDeviceModel(int $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId(int $groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    abstract public static function getSupportedTypes() : array;
}