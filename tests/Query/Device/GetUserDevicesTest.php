<?php


namespace SkyCentrics\Tests\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\Query\Device\GetUserDevices;
use SkyCentrics\Cloud\Test\CloudTest;
use SkyCentrics\Cloud\Test\Fixtures\DeviceFixtures;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Response\Response;

class GetUserDevicesTest extends CloudTest
{
    public function testCreateRequest()
    {
        $this->markTestIncomplete();
    }

    /**
     * @param $device
     *
     * @dataProvider deviceDataProvider
     */
    public function testMapResponse($path, $device)
    {
        /** @var Response $respMock */
        $respMock = $this->getResponseMock($device);

        $respMock->setRequest(Request::createFromParams(['path' => "/{$path}/"]));

        $query = new GetUserDevices($this->getAccount());
        $query->setAnnotationMapper($this->getAnnotationMapper());

        $result = $query->mapResponse($respMock);

        foreach ($result as $cloudDevice){
            $this->assertInstanceOf(AbstractCloudDevice::class, $cloudDevice);
        }
    }

    /**
     * @return array
     */
    public static function deviceDataProvider()
    {
        return [
            'Device data' => [
                'devices', [DeviceFixtures::getDevice()]
            ],
            'Smartplug data' => [
                'smartplugs', [DeviceFixtures::getSmartplug()]
            ],
            'Thermostat data' => [
                'thermostats', [DeviceFixtures::getThermostat()]
            ],
            'Cameras data' => [
                'cameras', [DeviceFixtures::getCamera()]
            ]
        ];
    }
}