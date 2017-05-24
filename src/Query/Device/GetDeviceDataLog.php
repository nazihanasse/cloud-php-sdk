<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetDeviceDataLog
 * @package SkyCentrics\Cloud\Query\Device
 */
class GetDeviceDataLog extends GetDeviceDataQuery
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
     * GetDeviceDataLog constructor.
     * @param AbstractCloudDevice $cloudDevice
     * @param \DateTime $begin
     * @param \DateTime $end
     */
    public function __construct(AbstractCloudDevice $cloudDevice, \DateTime $begin, \DateTime $end)
    {
        parent::__construct($cloudDevice);

        $this->begin = $begin;
        $this->end = $end;
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

        return $request;
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $response->getData();
    }
}