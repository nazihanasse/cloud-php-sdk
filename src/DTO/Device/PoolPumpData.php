<?php


namespace SkyCentrics\Cloud\DTO\Device;


class PoolPumpData extends AbstractDeviceData
{

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_PENTAIR,
            DeviceTypeInterface::TYPE_GENERIC_POOL_PUMP
        ], true);
    }

    public static function fromResponse(array $response): AbstractDeviceData
    {
        // TODO: Implement fromResponse() method.
    }
}