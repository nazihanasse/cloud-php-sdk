<?php


namespace SkyCentrics\Cloud\DTO\Device;


abstract class AbstractLogData
{
    protected $relay;

    protected $power;

    protected $sensors;

    protected $setpoint;

    protected $commodities;

    protected $connection;

    protected $state;

    public function getRelay(){}

    public function getPower(){}

    public function getSensors(){}

    public function getSetpoint(){}

    public function getConnection(){}

    public function getState(){}
}