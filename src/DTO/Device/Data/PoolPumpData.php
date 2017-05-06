<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class PoolPumpData extends AbstractData
{
    protected $relay;

    protected $override;

    protected $state;

    protected $commodity;

    protected $commodities;

    protected $power;

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_PENTAIR,
            DeviceTypeInterface::TYPE_GENERIC_POOL_PUMP
        ], true);
    }

    public static function fromResponse(array $response): AbstractData
    {
        // TODO: Implement fromResponse() method.
    }
}