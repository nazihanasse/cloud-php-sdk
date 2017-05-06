<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class PlugData extends AbstractData
{
    protected $voltage;

    protected $power;

    protected $powerFactor;

    protected $current;

    protected $frequency;

    protected $relay;

    protected $totalPower;

    protected $dimmer;

    protected $rssi;

    protected $sensors;

    protected $occupancy;

    protected $scheduler;

    protected $overrided;

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_PISNAP_3_DEPRECATED,
            DeviceTypeInterface::TYPE_SKYPLUG_110,
            DeviceTypeInterface::TYPE_GENERIC_METERING_PLUG
        ], true);
    }

    public static function fromResponse(array $response): AbstractData
    {
        // TODO: Implement fromResponse() method.
    }
}