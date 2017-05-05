<?php


namespace SkyCentrics\Cloud\DTO\Device;


class PlugData extends AbstractDeviceData
{

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_SKYPLUG_110,
            DeviceTypeInterface::TYPE_GENERIC_METERING_PLUG
        ], true);
    }

    public static function fromResponse(array $response): AbstractDeviceData
    {
        // TODO: Implement fromResponse() method.
    }
}