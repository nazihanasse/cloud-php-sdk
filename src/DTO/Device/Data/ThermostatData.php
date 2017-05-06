<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

/**
 * Class ThermostatData
 * @package SkyCentrics\Cloud\DTO\Device\Data
 */
class ThermostatData extends AbstractData
{
    protected $temperature;

    protected $setpoint;

    protected $offset;

    protected $state;

    protected $override;

    protected $relay;

    protected $commodity;

    protected $commodities;

    public function __construct(
        int $deviceId,
        \DateTime $time
    )
    {
        parent::__construct($deviceId, $time);
    }

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_ISLAND_AIRE_PTAC,
            DeviceTypeInterface::TYPE_EMERSON,
            DeviceTypeInterface::TYPE_MITSUBISHI,
            DeviceTypeInterface::TYPE_GENERIC_THERMOSTAT
        ],true);
    }

    public static function fromResponse(array $responseData): AbstractData
    {
        $deviceData = new self($responseData['device'], new \DateTime($responseData['time']));
    }
}