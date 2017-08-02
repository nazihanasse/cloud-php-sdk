<?php


namespace SkyCentrics\Cloud\Test\Fixtures;


use Faker\Factory;

/**
 * Class UserDataFixtures
 * @package SkyCentrics\Cloud\Test\Fixtures
 */
class UserDataFixtures
{
    public static function getUser()
    {
        $faker = Factory::create();

        return [
            "id" => random_int(100000, 200000),
            "auth" => md5(time()),
            "email" => $faker->email,
            "name" => array(
                'first' => $faker->firstName,
                'last' => $faker->lastName
            ),
            "address" => array(
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => random_int(200000, 900000),
                'country' => $faker->country
            ),
            "timezone" => $faker->timezone,
            "sync" => 0,
            "organization" => random_int(10000, 50000),
            "control" => 0
        ];
    }
}