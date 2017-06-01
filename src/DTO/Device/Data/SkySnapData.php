<?php


namespace SkyCentrics\Cloud\DTO\Device\Data;

use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class SkySnapData extends AbstractData
{
    /**
     * @var array
     */
    protected $currentTransformers = [];

    /**
     * @var array
     */
    protected $sensors = [];

    /**
     * @return array
     */
    public function getCurrentTransformers()
    {
        return $this->currentTransformers;
    }

    /**
     * @param array $currentTransformers
     * @Property(property="ct", type="array")
     */
    public function setCurrentTransformers(array $currentTransformers)
    {
        $this->currentTransformers = $currentTransformers;
    }

    /**
     * @return array
     */
    public function getSensors()
    {
        return $this->sensors;
    }

    /**
     * @param array $sensors
     * @Property(property="sensors", type="array")
     */
    public function setSensors(array $sensors)
    {
        $this->sensors = $sensors;
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
            new \DateTime($response['time'])
        );
    }
}