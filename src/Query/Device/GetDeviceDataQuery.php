<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\Device\ChargerData;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Device\PlugData;
use SkyCentrics\Cloud\DTO\Device\PoolPumpData;
use SkyCentrics\Cloud\DTO\Device\SkySnapData;
use SkyCentrics\Cloud\DTO\Device\ThermostatData;
use SkyCentrics\Cloud\DTO\Device\WaterHeaterData;
use SkyCentrics\Cloud\Exception\CloudQueryException;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDeviceDataQuery
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDeviceDataQuery extends AbstractDeviceQuery
{
    /**
     * @var AbstractCloudDevice
     */
    protected $cloudDevice;

    /**
     * @var string
     */
    protected $cloudDataClass;

    /**
     * GetDeviceDataQuery constructor.
     * @param AbstractCloudDevice $cloudDevice
     * @throws CloudQueryException
     */
    public function __construct(AbstractCloudDevice $cloudDevice)
    {
       $this->cloudDevice = $cloudDevice;

       foreach ([
           ThermostatData::class,
           SkySnapData::class,
           PlugData::class,
           PoolPumpData::class,
           WaterHeaterData::class,
           ChargerData::class
                ] as $className){
           if(!class_exists($className)){
               throw new CloudQueryException();
           }

           if($className::supportType($cloudDevice->getDeviceType())){
               $this->cloudDataClass = $className;
               break;
           }
       }
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf("/%s/data", $this->getPath())
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed|\SkyCentrics\Cloud\DTO\CloudDTOInterface
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $this->cloudDataClass::fromResponse($response->getData());
    }

    /**
     * @return CloudDeviceID
     */
    public function getDevice(): CloudDeviceID
    {
        return new CloudDeviceID($this->cloudDevice->getId(), $this->cloudDevice->getDeviceType());
    }
}