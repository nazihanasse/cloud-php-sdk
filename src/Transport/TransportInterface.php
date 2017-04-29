<?php


namespace SkyCentrics\Cloud\Transport;


use SkyCentrics\Cloud\Transport\Request\RequestInterface;

interface TransportInterface
{
    public function send(RequestInterface $request);
}