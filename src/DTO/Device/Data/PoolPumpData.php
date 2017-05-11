<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class PoolPumpData extends AbstractData
{
    /**
     * @var int
     */
    protected $relay;

    /**
     * @var int
     */
    protected $override;

    /**
     * @var int
     */
    protected $state;

    /**
     * @var array
     */
    protected $commodity;

    /**
     * @var array
     */
    protected $commodities;

    /**
     * @var int
     */
    protected $power;

    /**
     * @return int
     */
    public function getRelay(): ?int
    {
        return $this->relay;
    }

    /**
     * @param int $relay
     * @Property(property="relay", type="int")
     */
    public function setRelay(int $relay)
    {
        $this->relay = $relay;
    }

    /**
     * @return int
     */
    public function getOverride(): ?int
    {
        return $this->override;
    }

    /**
     * @param int $override
     * @Property(property="override", type="int")
     */
    public function setOverride(int $override)
    {
        $this->override = $override;
    }

    /**
     * @return int
     */
    public function getState(): ?int
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @Property(property="state", type="int")
     */
    public function setState(int $state)
    {
        $this->state = $state;
    }

    /**
     * @return array
     */
    public function getCommodity(): ?array
    {
        return $this->commodity;
    }

    /**
     * @param array $commodity
     * @Property(property="commodity", type="array")
     */
    public function setCommodity(array $commodity)
    {
        $this->commodity = $commodity;
    }

    /**
     * @return array
     */
    public function getCommodities(): ?array
    {
        return $this->commodities;
    }

    /**
     * @param array $commodities
     * @Property(property="commodities", type="array")
     */
    public function setCommodities(array $commodities)
    {
        $this->commodities = $commodities;
    }

    /**
     * @return int
     */
    public function getPower(): ?int
    {
        return $this->power;
    }

    /**
     * @param int $power
     * @Property(property="power", type="int")
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

    public static function fromResponse(array $response): AbstractData
    {
        return new self($response['device'], new \DateTime($response['time']));
    }
}