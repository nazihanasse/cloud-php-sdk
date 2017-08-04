<?php


namespace SkyCentrics\Cloud\Test\Fixtures;


use Faker\Factory;
use Faker\Provider\Base;
use Faker\Provider\Internet;
use Faker\Provider\Lorem;

class DeviceFixtures
{
    public static function getDevice()
    {
        return [
            'id' => random_int(1000, 2000),
            'user' => random_int(1000, 2000),
            'group' => random_int(1000, 2000),
            'mac' => Internet::macAddress(),
            'name' => Lorem::word(),
            'type' => random_int(3, 250)
        ];
    }

    public static function getSmartplug()
    {
        return [
            'i' => random_int(1000, 2000),
            'u' => random_int(1000, 2000),
            'h' => random_int(1, 5),
            't' => random_int(2, 3),
            'g' => random_int(1000, 2000),
            'm' => Internet::macAddress(),
            'n' => Lorem::word()
        ];
    }

    public static function getThermostat()
    {
        return [
            'i' => random_int(1000, 2000),
            'u' => random_int(1000, 2000),
            'h' => random_int(1, 5),
            't' => 1,
            'g' => random_int(1000, 2000),
            'm' => Internet::macAddress(),
            'n' => Lorem::word(),
            'b' => random_int(0, 1)
        ];
    }

    public static function getCamera()
    {
        $faker = Factory::create();

        return [
            'i' => random_int(1000, 2000),
            'u' => random_int(1000, 2000),
            'h' => random_int(1, 5),
            'g' => random_int(1000, 2000),
            'n' => Lorem::word(),
            'a' => base64_encode($faker->userName . ':' . $faker->password()),
            'mfg' => Lorem::word(),
            'mdl' => Lorem::word(),
            'url' => $faker->url
        ];
    }
}