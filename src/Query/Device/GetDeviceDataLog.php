<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

class GetDeviceDataLog extends AbstractDeviceQuery
{

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        // TODO: Implement createRequest() method.
    }

    /**
     * @param ResponseInterface|MultiResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        // TODO: Implement mapResponse() method.
    }
}