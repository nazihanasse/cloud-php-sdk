<?php


namespace SkyCentrics\Cloud\Transport\Response;


use SkyCentrics\Cloud\Transport\Request\RequestInterface;

interface ResponseInterface
{
    public function getStatusCode();

    public function getData() : array;

    /**
     * @return RequestInterface|null
     */
    public function getRequest();
}