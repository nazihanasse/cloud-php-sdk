<?php


namespace SkyCentrics\Cloud\Query;


use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Interface QueryInterface
 * @package SkyCentrics\Cloud\Query
 */
interface QueryInterface
{
    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest() : RequestInterface;

    /**
     * @param ResponseInterface|MultiResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response);
}