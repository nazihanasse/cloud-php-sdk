<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class PoolPumpData extends AbstractData
{
    /**
     * @var int
     * @Property(key="relay")
     */
    protected $relay;

    /**
     * @var int
     * @Property(key="override")
     */
    protected $override;

    /**
     * @var int
     * @Property(key="state")
     */
    protected $state;

    /**
     * @var array
     * @Property(key="commodity")
     */
    protected $commodity;

    /**
     * @var array
     * @Property(key="commodities")
     */
    protected $commodities;

    /**
     * @var int
     * @Property(key="power")
     */
    protected $power;

    /**
     * @return int
     */
    public function getRelay()
    {
        return $this->relay;
    }

    /**
     * @param int $relay
     */
    public function setRelay(int $relay)
    {
        $this->relay = $relay;
    }

    /**
     * @return int
     */
    public function getOverride()
    {
        return $this->override;
    }

    /**
     * @param int $override
     */
    public function setOverride(int $override)
    {
        $this->override = $override;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     */
    public function setState(int $state)
    {
        $this->state = $state;
    }

    /**
     * @return array
     */
    public function getCommodity()
    {
        return $this->commodity;
    }

    /**
     * @param array $commodity
     */
    public function setCommodity(array $commodity)
    {
        $this->commodity = $commodity;
    }

    /**
     * @return array
     */
    public function getCommodities()
    {
        return $this->commodities;
    }

    /**
     * @param array $commodities
     */
    public function setCommodities(array $commodities)
    {
        $this->commodities = $commodities;
    }

    /**
     * @return int
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    public function setPower(int $power)
    {
        $this->power = $power;
    }

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_PENTAIR,
            DeviceTypeInterface::TYPE_GENERIC_POOL_PUMP
        ], true);
    }
}