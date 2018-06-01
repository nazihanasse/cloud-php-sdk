<?php


namespace SkyCentrics\Cloud\DTO\Device;

use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;
use SkyCentrics\Cloud\DTO\Device\Data\ChargerData;
use SkyCentrics\Cloud\DTO\Device\Data\CTThermostatData;
use SkyCentrics\Cloud\DTO\Device\Data\DeprecatedThermostatData;
use SkyCentrics\Cloud\DTO\Device\Data\EmersonWaterHeaterData;
use SkyCentrics\Cloud\DTO\Device\Data\MeterData;
use SkyCentrics\Cloud\DTO\Device\Data\PlugData;
use SkyCentrics\Cloud\DTO\Device\Data\PoolPumpData;
use SkyCentrics\Cloud\DTO\Device\Data\SkySnapData;
use SkyCentrics\Cloud\DTO\Device\Data\ThermostatData;
use SkyCentrics\Cloud\DTO\Device\Data\WaterHeaterData;
use SkyCentrics\Cloud\Exception\CloudQueryException;

/**
 * Class AbstractCloudDevice
 * @package SkyCentrics\Cloud\DTO
 */
abstract class AbstractCloudDevice implements CloudDTOInterface
{
    /**
     * @var int
     *
     * @Property(key="id", to_type="int")
     */
    protected $id = 0;

    /**
     * @var int
     *
     * @Property(key="user", to_type="int")
     */
    protected $userId;

    /**
     * @var int
     *
     * @Property(key="group", to_type="int")
     */
    protected $groupId;

    /**
     * @var string
     *
     * @Property(key="name", to_type="string")
     */
    protected $name;

    /**
     * @var int
     *
     * @Property(key="type", to_type="int")
     */
    protected $type = 0;

    /**
     * @var string
     *
     * @Property(key="mac", to_type="string")
     */
    protected $mac;

    /**
     * @var string|null
     */
    protected $model;

    /**
     * AbstractCloudDevice constructor.
     * @param int $userId
     * @param string $name
     * @param int $type
     * @param string $mac
     * @param int|null $groupId
     * @param string|null $model
     */
    public function __construct(
        int $userId,
        string $name,
        int $type,
        string $mac,
        int $groupId = 0,
        string $model = ''
    )
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->type=  $type;
        $this->mac = $mac;
        $this->model = $model;
        $this->groupId = $groupId;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getDeviceName()
    {
        return$this->name;
    }

    /**
     * @param string $name
     */
    public function setDeviceName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * @param string $mac
     */
    public function setMac(string $mac)
    {
        $this->mac = $mac;
    }

    /**
     * @return int
     */
    public function getDeviceType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setDeviceType(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDeviceModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setDeviceModel(string $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId(int $groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @return CloudDeviceID
     */
    public function getDeviceId()
    {
        return new CloudDeviceID($this->getId(), $this->getDeviceType());
    }

    /**
     * @param $type
     * @return string
     * @throws CloudQueryException
     */
    public static function getDeviceDataDTO($type)
    {
        foreach ([
                     ThermostatData::class,
                     SkySnapData::class,
                     PlugData::class,
                     PoolPumpData::class,
                     WaterHeaterData::class,
                     EmersonWaterHeaterData::class,
                     ChargerData::class,
                     CTThermostatData::class,
                     DeprecatedThermostatData::class,
                     MeterData::class
                 ] as $className){
            if(!class_exists($className)){
                throw new CloudQueryException();
            }

            if($className::supportType($type)){
                $cloudDataClass = $className;
                break;
            }
        }

        if(empty($cloudDataClass)){
            throw new CloudQueryException(sprintf("Missing data class for the type %s !", $type));
        }

        return $cloudDataClass;
    }

    /**
     * @param int $deviceType
     * @return string
     */
    public static function getDeviceClassFromType(int $deviceType)
    {
        switch ($deviceType){
            case DeviceTypeInterface::TYPE_THERMOSTAT_DEPRECATED:
                return CloudThermostat::class;
            case DeviceTypeInterface::TYPE_GENERIC_METERING_PLUG:
            case DeviceTypeInterface::TYPE_SKYPLUG_110:
                return CloudSmartplug::class;
            case DeviceTypeInterface::TYPE_CAMERAS:
                return CloudCamera::class;
            case DeviceTypeInterface::TYPE_METERS_0:
                return CloudMeter::class;
            default :
                return CloudDevice::class;
        }
    }

    /**
     * @param int $deviceType
     * @return string
     */
    public static function getDeviceKindFromType(int $deviceType)
    {
        switch ($deviceType){
            case DeviceTypeInterface::TYPE_GENERIC_METERING_PLUG:
            case DeviceTypeInterface::TYPE_SKYPLUG_110:
            case DeviceTypeInterface::TYPE_PISNAP_3_DEPRECATED:
                return DeviceKindInterface::KIND_SMARTPLUG;
            case DeviceTypeInterface::TYPE_ISLAND_AIRE_PTAC:
                return DeviceKindInterface::KIND_DEVICE;
            default :
                return DeviceKindInterface::KIND_THERMOSTAT;
        }
    }

}