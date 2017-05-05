<?php


namespace SkyCentrics\Cloud\DTO\Device;


class ChargerData extends AbstractDeviceData
{

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_CLIPPER_CREEK,
            DeviceTypeInterface::TYPE_GENERIC_EV_CHARGER,
            DeviceTypeInterface::TYPE_SIEMENS
        ], true);
    }

    public static function fromResponse(array $response): AbstractDeviceData
    {
        // TODO: Implement fromResponse() method.
    }
}