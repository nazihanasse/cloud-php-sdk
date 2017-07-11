<?php


namespace SkyCentrics\Cloud\Test\DTO\Device\Data;


use SkyCentrics\Cloud\DTO\Device\AbstractDeviceData;
use SkyCentrics\Cloud\DTO\Device\CloudDevice;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;
use SkyCentrics\Cloud\Test\CloudTest;
use SkyCentrics\Cloud\Test\Fixtures\DeviceDataFixtures;

class DeviceDataTest extends CloudTest
{
    /**
     * @dataProvider deviceDataProvider
     */
    public function testMapResponse($deviceType, $deviceData)
    {
        $annotationMapper = $this->getCloud()->getAnnotationMapper();

        /** @var AbstractDeviceData $deviceDataDTO */
        $deviceDataDTO = $annotationMapper->map(CloudDevice::getDeviceDataDTO($deviceType), $deviceData);

        $this->assertInstanceOf(\DateTime::class, $deviceDataDTO->getTime());

        $this->assertInstanceOf(AbstractDeviceData::class, $deviceDataDTO);
        $this->assertNotEmpty($deviceDataDTO->getDeviceId());
        $this->assertNotEmpty($deviceDataDTO->getTime());

        $resultArray = $annotationMapper->map($deviceDataDTO);

        foreach ($resultArray as $key => $value){
            if(isset($deviceData[$key])){
                $this->assertEquals($deviceData[$key], $value);
            }
        }
    }

    /**
     * @return array
     */
    public function deviceDataProvider()
    {
        return [
            'Plug data' => [DeviceTypeInterface::TYPE_SKYPLUG_110, DeviceDataFixtures::getPlugData()],
            'Thermostat data' => [DeviceTypeInterface::TYPE_EMERSON, DeviceDataFixtures::getThermostatData()],
            'CT Thermostat data' => [DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_80, DeviceDataFixtures::getCTThermostatData()],
            'Deprecated Thermostat data' => [DeviceTypeInterface::TYPE_THERMOSTAT_DEPRECATED, DeviceDataFixtures::getDeprecatedThermostatData()],
            'Water Heater data' => [DeviceTypeInterface::TYPE_EMERSON_SWITCH, DeviceDataFixtures::getWaterHeaterData()],
            'Charger data' => [DeviceTypeInterface::TYPE_CLIPPER_CREEK, DeviceDataFixtures::getChargerData()],
            'Pool Pump data' => [DeviceTypeInterface::TYPE_PENTAIR, DeviceDataFixtures::getPoolPumpData()],
            'Sky Snap data' => [DeviceTypeInterface::TYPE_PISNAP_3, DeviceDataFixtures::getSkySnapData()]
        ];
    }
}