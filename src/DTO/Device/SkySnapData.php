<?php


namespace SkyCentrics\Cloud\DTO\Device;


class SkySnapData extends AbstractDeviceData
{

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_PISNAP_3
        ], true);
    }

    public static function fromResponse(array $response): AbstractDeviceData
    {
        // TODO: Implement fromResponse() method.
    }
}