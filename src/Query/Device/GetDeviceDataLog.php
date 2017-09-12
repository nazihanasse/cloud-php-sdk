<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Parameters\ParameterBag;
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
     * @var int
     */
    protected $gap;

    /**
     * @var bool
     */
    protected $asArray;

    /**
     * GetDeviceDataLog constructor.
     * @param CloudDeviceID $cloudDeviceID
     * @param \DateTime $begin
     * @param \DateTime $end
     * @param int
     * @param bool $asArray
     */
    public function __construct(
        CloudDeviceID $cloudDeviceID,
        \DateTime $begin,
        \DateTime $end,
        int $gap,
        $asArray = false)
    {
        parent::__construct($cloudDeviceID);

        $this->begin = $begin;
        $this->end = $end;
        $this->gap = $gap;

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
            'g' => $this->gap
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

        if(!$this->asArray) {

            return (function () use ($responseData) {
                foreach ($responseData as $time => $data) {
                    if (!isset($data['time'])) {
                        $data['time'] = $time;
                    }
                    $result = new ParameterBag($data);
                    yield $result;
                    unset($result);
                }
            })();
        }

        $result = [];

        foreach ($responseData as $time => $data){
            if(!isset($data['time'])){
                $data['time'] = $time;
            }
            $result[] = new ParameterBag($data);
        }

        return $result;
    }
}