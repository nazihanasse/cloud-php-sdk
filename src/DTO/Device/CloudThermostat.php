<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\Annotation\Property;

class CloudThermostat extends AbstractCloudDevice
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
    protected $type = 1;

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
     * @var int
     *
     * @Property(key="b")
     */
    protected $backlight = 0;

    /**
     * @var int
     */
    protected $holdMode;

    /**
     * @return int
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getBacklight()
    {
        return $this->backlight;
    }

    /**
     * @return int
     */
    public function getHoldMode(): int
    {
        return $this->holdMode;
    }

    /**
     * @param int $holdMode
     */
    public function setHoldMode(int $holdMode): void
    {
        $this->holdMode = $holdMode;
    }
}