<?php


namespace SkyCentrics\Tests\Query\Device;


use SkyCentrics\Cloud\Cloud;
use SkyCentrics\Cloud\DTO\Device\AbstractDeviceData;
use SkyCentrics\Cloud\DTO\Device\CloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;
use SkyCentrics\Cloud\Query\Device\GetDeviceData;
use SkyCentrics\Cloud\Test\CloudTest;
use SkyCentrics\Cloud\Test\Fixtures\DeviceDataFixtures;
use SkyCentrics\Cloud\Transport\Response\Response;

/**
 * Class GetDeviceDataTest
 * @package SkyCentrics\Tests\Query\Device
 *
 * @covers GetDeviceData
 */
class GetDeviceDataTest extends CloudTest
{

    public function testCreateRequest()
    {
        $this->markTestIncomplete();
    }

    /**
     * @dataProvider deviceDataProvider
     */
    public function testMapResponse($deviceType, $deviceData)
    {
        /** @var Response|\PHPUnit_Framework_MockObject_MockObject $respMock */
        $respMock = $this->getMockBuilder(Response::class)
                    ->disableOriginalConstructor()
                    ->getMock();

        $respMock->method('getData')
                 ->willReturn($deviceData);

        /** @var CloudDeviceID|\PHPUnit_Framework_MockObject_MockObject $deviceMoc */
        $deviceMoc = $this->getMockBuilder(CloudDeviceID::class)
                    ->disableOriginalConstructor()
                    ->setMethods(['getType'])
                    ->getMock();

        $deviceMoc->method('getType')
                    ->willReturn($deviceType);

        /** @var GetDeviceData */
        $getDeviceDataMock = new GetDeviceData($deviceMoc);

        $getDeviceDataMock->setAnnotationMapper($this->getAnnotationMapper());

        /** @var AbstractDeviceData $deviceDataDTO */
        $deviceDataDTO = $getDeviceDataMock->mapResponse($respMock);

        $this->assertInstanceOf(AbstractDeviceData::class, $deviceDataDTO);
        $this->assertNotEmpty($deviceDataDTO->getDeviceId());
        $this->assertNotEmpty($deviceDataDTO->getTime());
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