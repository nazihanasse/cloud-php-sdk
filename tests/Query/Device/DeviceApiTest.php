<?php


namespace SkyCentrics\Tests\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceInfo;
use SkyCentrics\Cloud\DTO\Device\DeviceTypeInterface;
use SkyCentrics\Cloud\Query\Device\CreateDevice;
use SkyCentrics\Cloud\Query\Device\DeleteDevice;
use SkyCentrics\Cloud\Query\Device\GetDevice;
use SkyCentrics\Cloud\Query\Device\GetDeviceInfo;
use SkyCentrics\Cloud\Query\Device\GetUserDevices;
use SkyCentrics\Cloud\Query\Device\UpdateDevice;
use SkyCentrics\Cloud\Query\User\CheckUserByEmail;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Test\CloudTest;

/**
 * Class DeviceApiTest
 * @package SkyCentrics\Tests\Query\Device
 *
 * @coversDefaultClass \Skycentrics\Cloud\Query\Device
 */
class DeviceApiTest extends CloudTest
{
    /**
     * @param string $name
     * @param int $type
     * @param string $mac
     * @return CloudDevice
     *
     */
    public function testCreate()
    {
        list($name, $type, $mac) = $this->deviceDataProvider();

        $user = self::getUser();

        $cloudDevice = new CloudDevice(
            $user->getId(),
            $name,
            $type,
            $mac
        );

        $this->assertEquals(self::getUser()->getId(), $cloudDevice->getUserId());

        $cloud = self::getCloud();

        $deviceId = $cloud->apply(new CreateDevice($cloudDevice), $user->getAccount());

        $this->assertInternalType('integer', $deviceId);
        $this->assertNotEmpty($cloudDevice->getId());

        return $cloudDevice;
    }

    /**
     * @param AbstractCloudDevice $cloudDevice
     *
     * @return AbstractCloudDevice
     *
     * @depends testCreate
     */
    public function testGet($cloudDevice)
    {
        /** @var CloudDevice $device */
        $device = self::getCloud()->apply(new GetDevice($cloudDevice->getDeviceId()));

        $this->assertInstanceOf(AbstractCloudDevice::class, $device);
        $this->assertEquals(self::getUser()->getId(), $device->getUserId());

        return $device;
    }

    /**
     *
     */
    public function testGetDevices()
    {
        /** @var AccountInterface $account */
        $account = $this->getAccount();

        $result = $this->getCloud()->apply(new GetUserDevices($account));

        foreach ($result as $cloudDevices){
            foreach ($cloudDevices as $cloudDevice){
                $this->assertInstanceOf(AbstractCloudDevice::class, $cloudDevice);
            }
        }
    }

    /**
     * @param CloudDevice $cloudDevice
     * @depends testGet
     */
    public function testGetInfo(CloudDevice $cloudDevice)
    {
        $deviceInfo = $this->getCloud()->apply(new GetDeviceInfo($cloudDevice->getDeviceId()));

        $this->assertInstanceOf(CloudDeviceInfo::class, $deviceInfo);
    }

    /**
     * @depends testGet
     */
    public function testUpdate(AbstractCloudDevice $cloudDevice)
    {
        $this->assertEquals(self::getUser()->getId(), $cloudDevice->getUserId());

        $cloudDevice->setDeviceName('New Test DeviceName');

        $this->assertEmpty(self::getCloud()->apply(new UpdateDevice($cloudDevice)));
    }

    /**
     * @depends testGet
     */
    public function testDelete(CloudDevice $cloudDevice)
    {
        $this->assertEquals(self::getUser()->getId(), $cloudDevice->getUserId());
        $this->assertEmpty(self::getCloud()->apply(new DeleteDevice($cloudDevice)));
    }

    /**
     * @return array
     */
    public function deviceDataProvider()
    {

        $generateMac = function(){
            return substr(md5(time()), 0, 12);
        };

        return [
            'Test device CT-80',
            DeviceTypeInterface::TYPE_RADIO_THERMOSTAT_CT_80,
            $generateMac()
        ];
    }
}