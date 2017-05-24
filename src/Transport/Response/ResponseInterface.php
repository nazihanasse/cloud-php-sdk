<?php


namespace SkyCentrics\Cloud\Transport\Response;


use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Interface ResponseInterface
 * @package SkyCentrics\Cloud\Transport\Response
 */
interface ResponseInterface
{
    /**
     * @return mixed
     */
    public function getStatusCode();

    /**
     * @return array
     */
    public function getHeaders() : array;

    /**
     * @return mixed
     */
    public function getBody();

    /**
     * @return array
     */
    public function getData() : array;

    /**
     * @return RequestInterface|null
     */
    public function getRequest();

    /**
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request);

    /**
     * @return bool
     */
    public function isSuccess(bool $isSuccess = null) : bool;
}