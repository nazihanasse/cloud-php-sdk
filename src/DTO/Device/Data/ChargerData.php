<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;


use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

/**
 * Class ChargerData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class ChargerData extends AbstractData
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
     * @return int
     */
    public function getRelay()
    {
        return $this->relay;
    }

    /**
     * @param int $relay
     * @Method(property="relay", type="int")
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
     * @Method(property="override", type="int")
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
     * @Method(property="state", type="int")
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
     * @Method(property="commodity", type="array")
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
     * @Method(property="commodities", type="array")
     */
    public function setCommodities(array $commodities)
    {
        $this->commodities = $commodities;
    }

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_CLIPPER_CREEK,
            DeviceTypeInterface::TYPE_GENERIC_EV_CHARGER,
            DeviceTypeInterface::TYPE_SIEMENS
        ], true);
    }

    public static function fromResponse(array $response): AbstractData
    {
        return new self($response['device'], new \DateTime($response['time']));
    }
}