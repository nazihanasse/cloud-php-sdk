<?php


namespace SkyCentrics\Tests\Query\Device;


use SkyCentrics\Cloud\Annotation\AnnotationHandler;
use SkyCentrics\Cloud\Annotation\AnnotationMapper;
use SkyCentrics\Cloud\Annotation\AnnotationReader;
use SkyCentrics\Cloud\Cloud;
use SkyCentrics\Cloud\DTO\Device\AbstractData;
use SkyCentrics\Cloud\DTO\Device\CloudDevice;
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
        $cloud = new Cloud();

        /** @var Response|\PHPUnit_Framework_MockObject_MockObject $respMock */
        $respMock = $this->getMockBuilder(Response::class)
                    ->disableOriginalConstructor()
                    ->getMock();

        $respMock->method('getData')
                 ->willReturn($deviceData);

        /** @var CloudDevice|\PHPUnit_Framework_MockObject_MockObject $deviceMoc */
        $deviceMoc = $this->getMockBuilder(CloudDevice::class)
                    ->disableOriginalConstructor()
                    ->setMethods(['getDeviceType'])
                    ->getMock();

        $deviceMoc->method('getDeviceType')
                    ->willReturn($deviceType);

        /** @var GetDeviceData */
        $getDeviceDataMock = new GetDeviceData($deviceMoc);

        $getDeviceDataMock->setAnnotationMapper($this->getAnnotationMapper());

        /** @var AbstractData $deviceDataDTO */
        $deviceDataDTO = $getDeviceDataMock->mapResponse($respMock);

        $this->assertInstanceOf(AbstractData::class, $deviceDataDTO);
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