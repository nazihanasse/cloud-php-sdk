<?php


namespace SkyCentrics\Cloud\DTO\Device;


class CloudData extends AbstractDeviceData
{
    protected $comodities;

    protected $temperature;

    protected $power;

    protected $heat;

    protected $cool;

    protected $sensors;

    public function supportType(int $type): bool
    {
        // TODO: Implement supportType() method.
    }

    public static function fromResponse(array $response): AbstractDeviceData
    {
        // TODO: Implement fromResponse() method.
    }
}