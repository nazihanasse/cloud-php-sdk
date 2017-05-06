<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;


use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class ChargerData extends AbstractData
{
    protected $relay;

    protected $override;

    protected $state;

    protected $commodity;

    protected $commodities;

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
        // TODO: Implement fromResponse() method.
    }
}