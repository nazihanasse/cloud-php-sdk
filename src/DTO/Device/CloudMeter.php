<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\Annotation\Property;

/**
 * Class CloudMeter
 * @package SkyCentrics\Cloud\DTO\Device
 */
class CloudMeter extends AbstractCloudDevice
{
    /**
     * @var int
     *
     * @Property(key="d.i", to_type="int")
     */
    protected $id = 0;

    /**
     * @var int
     *
     * @Property(key="d.u", to_type="int")
     */
    protected $userId;

    /**
     * @var int
     *
     * @Property(key="d.h", to_type="int")
     */
    protected $groupId = 0;

    /**
     * @var string
     *
     * @Property(key="d.n", to_type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @Property(key="d.m", to_type="string")
     */
    protected $mac = 0;

    /**
     * @var int
     *
     */
    protected $type = DeviceTypeInterface::TYPE_METERS_0;


    /**
     * @var string
     *
     * @Property(key="i.mdl")
     */
    protected $model;


    /**
     * @var string
     *
     * @Property(key="i.mfg")
     */
    protected $manufacturer = 'Rainforest Automation, Inc.';

    /**
     * @var string
     *
     * @Property(key="i.url")
     */
    protected $url = '';


    /**
     * AbstractCloudDevice constructor.
     * @param int $userId
     * @param string $name
     * @param int $type
     * @param string $mac
     * @param string|null $model
     */
    public function __construct(
        int $userId,
        string $name,
        int $type,
        string $mac,
        int $groupId = 0,
        string $model = ''
    )
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->type = $type;
        $this->mac = $mac;
        $this->model = $model;
        $this->groupId = $groupId;
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
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId(int $groupId): void
    {
        $this->groupId = $groupId;
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
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMac(): string
    {
        return $this->mac;
    }

    /**
     * @param string $mac
     */
    public function setMac(string $mac): void
    {
        $this->mac = $mac;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     */
    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}