<?php


namespace SkyCentrics\Cloud\Test\Fixtures;


use Faker\Provider\Base;
use Faker\Provider\DateTime;

/**
 * Class DeviceDataFixtures
 * @package SkyCentrics\Cloud\Test\Fixtures
 */
class DeviceDataFixtures
{
    /**
     * @return array
     */
    public static function getPlugData()
    {
        return [
            'v' => Base::randomFloat(3,0, 100),
            'p' => Base::randomFloat(3, 0, 100),
            'pf' => Base::randomFloat(3, 0, 100),
            'c' => Base::randomFloat(3, 0, 100),
            'f' => Base::randomFloat(3, 0, 100),
            'r' => random_int(0, 1),
            't' => Base::randomFloat(3, 0, 100),
            'd' => random_int(0, 100),
            'rssi' => random_int(0,300),
            'w' => (function(){
                $sensors = [];
                $limit = random_int(0, 4);
                for($i = 0; $i <= $limit; $i++){
                    $sensors[] = [];
                }
                return $sensors;
            })(),
            'ocp' => random_int(0, 3),
            'se' => random_int(10000, 20000),
            'uo' => random_int(0,1),
            'i' => random_int(300000,600000),
            'time' => DateTime::dateTime('now')->format('Y-m-d H:i:s')
        ];
    }

    /**
     * @return array
     */
    public static function getThermostatData()
    {
        return [
            'temperature' => [
                'data' => [
                    random_int(0, 100)
                ],
                'device' => random_int(0, 5),
                'units' => 'F'
            ],
            'setpoint' => [
                'data' => [
                    random_int(0, 100),
                    random_int(0, 100)
                ],
                'type' => random_int(0, 4),
                'units' => 'F'
            ],
            'offset' => [
                'data' => random_int(0, 100),
                'units' => 'F'
            ],
            'state' => random_int(0,9),
            'override' => random_int(0,1),
            'relay' => random_int(0,1),
            'commodity' => [
                'code' => random_int(0, 7),
                'cumulative' => random_int(0, 100),
                'estimated' => random_int(0,1),
                'instantaneous' => random_int(0, 100),
                'name' => 'Electricity Consumed',
                'units' => 'W & W-hr'
            ],
            'commodities' => (function(){
                $commodities = [];
                $limit = random_int(0, 7);
                for ($i = 0; $i <= $limit; $i++){
                    $commodities[] = [
                        'code' => random_int(0, 7),
                        'cumulative' => random_int(0, 100),
                        'estimated' => random_int(0,1),
                        'instantaneous' => random_int(0, 100),
                        'name' => 'Electricity Consumed',
                        'units' => 'W & W-hr'
                    ];
                }
                return $commodities;
            })(),
            'device' => random_int(300000,600000),
            'time' => DateTime::dateTime('now')->format('Y-m-d H:i:s')
        ];
    }

    public static function getCTThermostatData()
    {
        return [
            'temperature' => [
                'data' => [
                    random_int(0,100)
                ],
                'units' => 'F'
            ],
            'thermostat' => [
                'mode' => random_int(1, 2),
                'state' => random_int(1, 2)
            ],
            'fan' => [
                'mode' => random_int(1, 2),
                'state' => random_int(1, 2)
            ],
            'humidity' => [
                'data' => [
                    random_int(0,100)
                ],
                'units' => '%'
            ],
            'setpoint' => [
                'data' => [
                    random_int(0,100),
                    random_int(0,100)
                ],
                'units' => 'F'
            ],
            'device' => random_int(300000,600000),
            'time' => DateTime::dateTime('now')->format('Y-m-d H:i:s')
        ];
    }

    public static function getDeprecatedThermostatData()
    {
        return [
            'cm' => random_int(0, 1),
            'tm' => random_int(0, 1),
            'f' => random_int(0, 1),
            'l' => random_int(0, 1),
            't' => Base::randomFloat(3, 0, 100),
            'tsc' => random_int(0, 100),
            'tsh' => random_int(0, 100),
            'tc' => random_int(0, 100),
            'th' => random_int(0, 100),
            'ts' => random_int(0, 100),
            'h' => random_int(0, 100),
            'hs' => random_int(0, 100),
            'dd' => random_int(0, 1),
            'fo' => random_int(0, 1),
            'fh' => random_int(0, 1),
            'fs' => random_int(0, 1),
            'fe' => random_int(0, 1),
            'fa' => random_int(0, 1),
            'fu' => random_int(0, 1),
            'rssi' => random_int(0, 1),
            'i' => random_int(300000,600000),
            'time' => DateTime::dateTime('now')->format('Y-m-d H:i:s')
        ];
    }

    public static function getWaterHeaterData()
    {
        return [
            'relay' => random_int(0,1),
            'override' => random_int(0,1),
            'power' => Base::randomFloat(3, 0, 100),
            'state' => random_int(0,9),
            'commodity' => [
                'code' => random_int(0, 7),
                'cumulative' => random_int(0, 100),
                'estimated' => random_int(0,1),
                'instantaneous' => random_int(0, 100),
                'name' => 'Electricity Consumed',
                'units' => 'W & W-hr'
            ],
            'commodities' => (function(){
                $commodities = [];
                $limit = random_int(0, 7);
                for ($i = 0; $i <= $limit; $i++){
                    $commodities[] = [
                        'code' => random_int(0, 7),
                        'cumulative' => random_int(0, 100),
                        'estimated' => random_int(0,1),
                        'instantaneous' => random_int(0, 100),
                        'name' => 'Electricity Consumed',
                        'units' => 'W & W-hr'
                    ];
                }
                return $commodities;
            })(),
            'offset' => [
                'data' => random_int(0, 100),
                'units' => 'F'
            ],
            'setpoint' => [
                 'data' => [
                    random_int(0,100),
                    random_int(0,100)
                ],
                'units' => 'F'
            ],
            'device' => random_int(300000,600000),
            'time' => DateTime::dateTime('now')->format('Y-m-d H:i:s')
        ];
    }

    public static function getChargerData()
    {
        return [
            'relay' => random_int(0,1),
            'override' => random_int(0,1),
            'state' => random_int(0,9),
            'commodity' => [
                'code' => random_int(0, 7),
                'cumulative' => random_int(0, 100),
                'estimated' => random_int(0,1),
                'instantaneous' => random_int(0, 100),
                'name' => 'Electricity Consumed',
                'units' => 'W & W-hr'
            ],
            'commodities' => (function(){
                $commodities = [];
                $limit = random_int(0, 7);
                for ($i = 0; $i <= $limit; $i++){
                    $commodities[] = [
                        'code' => random_int(0, 7),
                        'cumulative' => random_int(0, 100),
                        'estimated' => random_int(0,1),
                        'instantaneous' => random_int(0, 100),
                        'name' => 'Electricity Consumed',
                        'units' => 'W & W-hr'
                    ];
                }
                return $commodities;
            })(),
            'device' => random_int(300000,600000),
            'time' => DateTime::dateTime('now')->format('Y-m-d H:i:s')
        ];
    }

    public static function getPoolPumpData()
    {
        return [
            'relay' => random_int(0,1),
            'override' => random_int(0,1),
            'power' => Base::randomFloat(3, 0, 100),
            'state' => random_int(0,9),
             'commodity' => [
                'code' => random_int(0, 7),
                'cumulative' => random_int(0, 100),
                'estimated' => random_int(0,1),
                'instantaneous' => random_int(0, 100),
                'name' => 'Electricity Consumed',
                'units' => 'W & W-hr'
            ],
            'commodities' => (function(){
                $commodities = [];
                $limit = random_int(0, 7);
                for ($i = 0; $i <= $limit; $i++){
                    $commodities[] = [
                        'code' => random_int(0, 7),
                        'cumulative' => random_int(0, 100),
                        'estimated' => random_int(0,1),
                        'instantaneous' => random_int(0, 100),
                        'name' => 'Electricity Consumed',
                        'units' => 'W & W-hr'
                    ];
                }
                return $commodities;
            })(),
            'device' => random_int(300000,600000),
            'time' => DateTime::dateTime('now')->format('Y-m-d H:i:s')
        ];
    }

    public static function getSkySnapData()
    {
        return [
            'ct' => (function(){
                $transformers = [];
                $limit = random_int(0, 7);
                for($i = 1; $i <= $limit; $i++){
                    $transformers[] = [
                        'current' => random_int(0,1),
                        'id' => $i,
                        'power' => [
                            'apparent' => random_int(0,100),
                            'real' => random_int(0, 100)
                        ],
                        'power_factor' => random_int(0,1),
                        'rating' => random_int(10, 300),
                        'voltage' => Base::randomFloat(4, 0, 10)
                    ];
                }

                return $transformers;
            })(),
            'sensors' => [],
            'device' => random_int(300000,600000),
            'time' => DateTime::dateTime('now')->format('Y-m-d H:i:s')
        ];
    }
}