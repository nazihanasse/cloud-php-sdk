<?php


namespace SkyCentrics\Tests\Query\Device;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;
use SkyCentrics\Cloud\Parameters\ParameterBag;
use SkyCentrics\Cloud\Query\Device\GetDeviceDataLog;
use SkyCentrics\Cloud\Test\CloudTest;
use SkyCentrics\Cloud\Test\Fixtures\DeviceDataLogFixtures;
use SkyCentrics\Cloud\Transport\Response\Response;

/**
 * Class GetDeviceDataLogTest
 * @package SkyCentrics\Tests\Query\Device
 */
class GetDeviceDataLogTest extends CloudTest
{
    /**
     *
     */
    public function testCreateRequest()
    {
        $this->markTestIncomplete();
    }

    /**
     * @param $deviceType
     * @param $deviceDataLog
     * @dataProvider deviceDataLogProvider
     */
    public function testMapResponse($deviceType, $deviceDataLog)
    {
        $respMock = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->setMethods(['getData'])
            ->getMock();

        $respMock->method('getData')
            ->willReturn($deviceDataLog);

        $getDeviceLogQuery = new GetDeviceDataLog(
            new CloudDeviceID(random_int(1000000, 2000000), $deviceType),
            new \DateTime(),
            new \DateTime()
        );

        /** @var \Generator $generator */
        $generator = $getDeviceLogQuery->mapResponse($respMock);

        $this->assertNotEmpty($generator);

        $this->assertInstanceOf(\Generator::class, $generator);

        $parameterBag = $generator->current();

        $this->assertInstanceOf(ParameterBag::class, $parameterBag);

        $getDeviceLogQueryAsArray = new GetDeviceDataLog(
            new CloudDeviceID(random_int(1000000, 2000000), $deviceType),
            new \DateTime(),
            new \DateTime(),
            true
        );

        $arrayResult = $getDeviceLogQueryAsArray->mapResponse($respMock);

        $this->assertInternalType('array', $arrayResult);
        $this->assertNotEmpty($arrayResult);

        $arrayParameterBag = current($arrayResult);

        $this->assertInstanceOf(ParameterBag::class, $arrayParameterBag);
    }

    public function deviceDataLogProvider()
    {
        return [
            'Plug data' => [DeviceTypeInterface::TYPE_SKYPLUG_110, DeviceDataLogFixtures::getPlugData()],
            'Thermostat data' => [DeviceTypeInterface::TYPE_EMERSON, DeviceDataLogFixtures::getThermostatData()],
            'CT Thermostat data' => [DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_80, DeviceDataLogFixtures::getCTThermostatData()],
            'Deprecated Thermostat data' => [DeviceTypeInterface::TYPE_THERMOSTAT_DEPRECATED, DeviceDataLogFixtures::getDeprecatedThermostatData()],
            'Water Heater data' => [DeviceTypeInterface::TYPE_EMERSON_SWITCH, DeviceDataLogFixtures::getWaterHeaterData()],
            'Charger data' => [DeviceTypeInterface::TYPE_CLIPPER_CREEK, DeviceDataLogFixtures::getChargerData()],
            //@TODO: fill this log data.
            //'Pool Pump data' => [DeviceTypeInterface::TYPE_PENTAIR, DeviceDataLogFixtures::getPoolPumpData()],
            'Sky Snap data' => [DeviceTypeInterface::TYPE_PISNAP_3, DeviceDataLogFixtures::getSkySnapData()]
        ];
    }
}