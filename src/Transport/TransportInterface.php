<?php


namespace SkyCentrics\Cloud\Transport;


use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;

/**
 * Interface TransportInterface
 * @package SkyCentrics\Cloud\Transport
 */
interface TransportInterface
{
    /**
     * @param RequestInterface $request
     * @return mixed
     */
    public function send(RequestInterface $request);

    /**
     * @param MultiRequestInterface $multiRequest
     * @return MultiResponseInterface
     */
    public function sendMulti(MultiRequestInterface $multiRequest) : MultiResponseInterface;
}