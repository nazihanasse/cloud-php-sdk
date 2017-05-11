<?php


namespace SkyCentrics\Cloud\Transport;


use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;

class GuzzleHttpTransport implements TransportInterface
{

    /**
     * @param RequestInterface $request
     * @return mixed
     */
    public function send(RequestInterface $request)
    {
        // TODO: Implement send() method.
    }

    /**
     * @param MultiRequestInterface $multiRequest
     * @return MultiResponseInterface
     */
    public function sendMulti(MultiRequestInterface $multiRequest): MultiResponseInterface
    {
        // TODO: Implement sendMulti() method.
    }
}