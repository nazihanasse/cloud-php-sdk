<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\Annotation\Property;

/**
 * Class CloudSmartplug
 * @package SkyCentrics\Cloud\DTO\Device
 */
class CloudSmartplug extends AbstractCloudDevice
{
    /**
     * @var int
     *
     * @Property(key="i", to_type="int")
     */
    protected $id = 0;

    /**
     * @var int
     *
     * @Property(key="u", to_type="int")
     */
    protected $userId;

    /**
     * @var int
     *
     * @Property(key="g", to_type="int")
     */
    protected $groupId;

    /**
     * @var string
     *
     * @Property(key="n", to_type="string")
     */
    protected $name;

    /**
     * @var int
     *
     * @Property(key="t", to_type="int")
     */
    protected $type = 2;

    /**
     * @var string
     *
     * @Property(key="m", to_type="string")
     */
    protected $mac;

    /**
     * @var int
     *
     * @Property(key="h")
     */
    protected $location;

    /**
     * @return int
     */
    public function getLocation()
    {
        return $this->location;
    }
}