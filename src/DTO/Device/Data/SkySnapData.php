<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class SkySnapData extends AbstractData
{
    protected $currentTransformers;

    protected $sensors;

    public function __construct(
        $deviceId,
        \DateTime $time,
        array $currentTransformers,
        array $sensors
    )
    {
        parent::__construct($deviceId, $time);

        $this->sensors = $sensors;
        $this->currentTransformers = $currentTransformers;
    }

    public function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_PISNAP_3
        ], true);
    }

    public static function fromResponse(array $response): AbstractData
    {
        return new self(
            $response['device'],
            new \DateTime($response['time']),
            $response['ct'] ?? [],
            $response['sensors'] ?? []
        );
    }
}