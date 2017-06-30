<?php


namespace SkyCentrics\Cloud\Test\Fixtures;


use Faker\Provider\Base;
use Faker\Provider\DateTime;

/**
 * Class DeviceDataLogFixtures
 * @package SkyCentrics\Cloud\Test\Fixtures
 */
class DeviceDataLogFixtures extends DeviceDataFixtures
{
    public static function getPlugData()
    {
        return self::inCycle(function(){
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
                'occ' => random_int(0, 3),
                'pd' => random_int(0, 1),
                'se' => random_int(10000, 20000)
           ];
        });
    }

    public static function getThermostatData()
    {
        return self::inCycle(function(){
            return [
                'r' => random_int(0,1),
                'state' => random_int(0,9),
                'p' => random_int(0, 100),

                'sensors' => (function(){
                    $sensors = [];
                    $limit = random_int(1, 4);

                    for($i = 1; $i <= $limit; $i++){
                        $sensors[] = [
                            random_int(0, 100)
                        ];
                    }

                    return $sensors;
                })(),

                'setpoint' => [
                    random_int(0, 100),
                    random_int(0, 100)
                ],

                'fan_mode' => random_int(0, 100),
                'temperature' => random_int(0, 100),
                'connection' => random_int(0, 4),

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
                })()
            ];
        });
    }

    /**
     * @return array
     */
    public static function getCTThermostatData()
    {
        return self::inCycle(function (){
            return [
                'temperature' => random_int(0, 100),
                'thermostat_mode' => random_int(0, 5),
                'fan_mode' => random_int(0, 5),
                'humidity' => random_int(0, 100),
                'setpoint' => [
                    random_int(0,100),
                    random_int(0,100)
                ],
                'connection' => random_int(0, 4)
            ];
        });
    }

    /**
     * @return array
     */
    public static function getDeprecatedThermostatData()
    {
        return self::inCycle(function(){
            return [
                'cm' => random_int(0, 1),
                'f' => random_int(0, 1),
                'l' => random_int(0, 1),
                't' => Base::randomFloat(3, 0, 100),
                'th' => random_int(0, 100),
                'h' => random_int(0, 100),
                'rssi' => random_int(0, 1),

                'm' => random_int(0, 10),
                'tt' => [
                    'h' => random_int(0, 100),
                    'c' => random_int(0, 100)
                ],
                'mt' => [
                    'h' => random_int(0, 100),
                    'c' => random_int(0, 100)
                ],
                'mh' => random_int(0, 100),
                'd' => random_int(0, 100),
                'es' => random_int(0, 100),
                'p' => random_int(0, 100),
                'o' => [
                    't' => random_int(0, 100),
                    'h' => random_int(0, 100)
                ]
            ];
        });
    }

    /**
     * @return array
     */
    public static function getWaterHeaterData()
    {
        return self::inCycle(function(){
            return [
                'r' => random_int(0,1),
                'p' => Base::randomFloat(3, 0, 100),
                'state' => random_int(0,9),
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
                'thermostat_mode' => random_int(0, 1),
                'fan_mode' => random_int(0, 1),
                'temperature' => random_int(0, 1),
                'setpoint' => [
                     'data' => [
                        random_int(0,100),
                        random_int(0,100)
                    ],
                    'units' => 'F'
                ],
                'connection' => random_int(0, 4)
            ];
        });
    }

    /**
     * @return array
     */
    public static function getChargerData()
    {
        return self::inCycle(function(){
            return [
                'r' => random_int(0,1),
                'state' => random_int(0,9),
                'p' => random_int(0, 100),

                'sensors' => (function(){
                    $sensors = [];
                    $limit = random_int(1, 4);

                    for($i = 1; $i <= $limit; $i++){
                        $sensors[] = [
                            random_int(0, 100)
                        ];
                    }

                    return $sensors;
                })(),

                'setpoint' => [
                    random_int(0, 100),
                    random_int(0, 100)
                ],

                'fan_mode' => random_int(0, 100),
                'temperature' => random_int(0, 100),
                'connection' => random_int(0, 4),

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
                })()
            ];
        });
    }

    public static function getPoolPumpData()
    {
        //@TODO: complete
    }

    public static function getSkySnapData()
    {
        $data = self::inCycle(function (){
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
                'connection' => random_int(0, 4),
                'sensors' => [],
                'device' => random_int(300000,600000)
            ];
        });

        $filtered = [];
        $i = 0;

        foreach ($data as $time => $value){
            $value['time'] = $time;
            $filtered[$i++] = $value;
        }

        return $filtered;
    }

    /**
     * @param $callback
     * @return array
     */
    protected static function inCycle($callback)
    {
        $limit = random_int(100, 1000);

        $data = [];
        $dateTime = new \DateTime('now');

        for($i = 0; $i <= $limit; $i++){
            $deviceData =  $callback();

            $data[$dateTime->modify('+1 minutes')->format('Y-m-d H:i:s')] = $deviceData;
        }

        return $data;
    }

}