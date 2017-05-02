<?php


namespace SkyCentrics\Cloud\Transport\Request;


interface MultiRequestInterface extends RequestInterface, \Iterator
{
    public function addRequest(RequestInterface $request);

    public function getRequests() : array;
}