<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDevice;
use SkyCentrics\Cloud\DTO\Device\Data\ChargerData;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\DTO\Device\Data\CTThermostatData;
use SkyCentrics\Cloud\DTO\Device\Data\PlugData;
use SkyCentrics\Cloud\DTO\Device\Data\PoolPumpData;
use SkyCentrics\Cloud\DTO\Device\Data\SkySnapData;
use SkyCentrics\Cloud\DTO\Device\Data\ThermostatData;
use SkyCentrics\Cloud\DTO\Device\Data\WaterHeaterData;
use SkyCentrics\Cloud\Exception\CloudQueryException;
use SkyCentrics\Cloud\Mapper\AnnotationMapper;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDeviceDataQuery
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDeviceData extends AbstractDeviceQuery
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

       $this->cloudDataClass = CloudDevice::getDeviceDataDTO($cloudDevice->getDeviceType());
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf("/%s/%s/data", $this->getPath($this->cloudDevice->getDeviceType()), $this->cloudDevice->getId())
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed|\SkyCentrics\Cloud\DTO\CloudDTOInterface
     */
    public function mapResponse(ResponseInterface $response)
    {
        $responseData = $response->getData();

        $dataDTO = $this->cloudDataClass::fromResponse($responseData);

        AnnotationMapper::fromResponse($responseData, $dataDTO);

        return $dataDTO;
    }

}