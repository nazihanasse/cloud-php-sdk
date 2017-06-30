<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDeviceDataLog
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDeviceDataLog extends GetDeviceData
{
    /**
     * @var \DateTime
     */
    protected $begin;

    /**
     * @var \DateTime
     */
    protected $end;

    /**
     * @var bool
     */
    protected $asArray;

    /**
     * GetDeviceDataLog constructor.
     * @param CloudDeviceID $cloudDeviceID
     * @param \DateTime $begin
     * @param \DateTime $end
     * @param bool $asArray
     */
    public function __construct(
        CloudDeviceID $cloudDeviceID,
        \DateTime $begin,
        \DateTime $end,
        $asArray = false)
    {
        parent::__construct($cloudDeviceID);

        $this->begin = $begin;
        $this->end = $end;

        $this->asArray = $asArray;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        $request = parent::createRequest();

        $request->setQuery([
            'b' => $this->begin->format('Y-m-d') . 'T' . $this->begin->format('H:i:s'),
            'e' => $this->end->format('Y-m-d') . 'T' . $this->end->format('H:i:s'),
            'g' => 1
        ]);

        $headers = $request->getHeaders();

        // @TODO: Cloud API returns result from time to time for request with this header.
        unset($headers['Accept']);

        $request->setHeaders($headers);

        return $request;
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    public function mapResponse(ResponseInterface $response)
    {
        $responseData = $response->getData();

        $mappingClass = $this->mappingClass;

        if(!$this->asArray){

            $annotationMapper = $this->getAnnotationMapper();

            return function() use ($mappingClass, $responseData, $annotationMapper) {
                foreach ($responseData as $time => $data){
                    if(!isset($data['time'])){
                        $data['time'] = $time;
                    }
                    $result = $annotationMapper->map($mappingClass, $data);
                    yield $result;
                    unset($result);
                }
            };

        }else{

            $result = [];

            foreach ($responseData as $time => $data){
                if(!isset($data['time'])){
                    $data['time'] = $time;
                }
                $result[] = $this->map($mappingClass, $data);
            }

            return $result;
        }
    }
}