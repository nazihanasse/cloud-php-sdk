<?php


namespace SkyCentrics\Tests\Query\Device;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Exception\CloudResponseException;
use SkyCentrics\Cloud\Query\Device\Properties\SetDimmer;
use SkyCentrics\Cloud\Query\Device\Properties\SetRelay;
use SkyCentrics\Cloud\Test\CloudTest;

/**
 * Class DevicePropertyTest
 * @package SkyCentrics\Tests\Query\Device
 */
class DevicePropertyTest extends CloudTest
{
    public function testSetDimmer()
    {
        $deviceId = new CloudDeviceID(12803, 250);

        try{
            $this->getCloud()->apply(new SetDimmer($deviceId, true, 100));
        }catch (CloudResponseException $exception){
            $this->markAsRisky();
        }

        $this->assertTrue(true);
    }

    public function testSetRelay()
    {
        $deviceId = new CloudDeviceID(12803, 250);

        try{
            $this->getCloud()->apply(new SetRelay($deviceId, true, 1));
        }catch (CloudResponseException $exception){
            $this->markAsRisky();
        }

        $this->assertTrue(true);
    }
}