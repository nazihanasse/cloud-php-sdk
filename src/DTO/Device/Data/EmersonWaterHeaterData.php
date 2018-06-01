<?php
/**
 * Created by PhpStorm.
 * User: alexandr.mashukevich
 * Date: 1.6.18
 * Time: 16.49
 */

namespace SkyCentrics\Cloud\DTO\Device\Data;


use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;

class EmersonWaterHeaterData extends WaterHeaterData
{
    /**
     * @var int
     *
     * @Property(key="hold_mode.data", to_type="int")
     */
    protected $holdMode;

    /**
     * @return int
     */
    public function getHoldMode(): int
    {
        return $this->holdMode;
    }

    /**
     * @param int $holdMode
     */
    public function setHoldMode(int $holdMode): void
    {
        $this->holdMode = $holdMode;
    }

    public static function supportType(int $type): bool
    {
        return in_array($type, [
            DeviceTypeInterface::TYPE_EMERSON_SWITCH,
        ],true);
    }

}