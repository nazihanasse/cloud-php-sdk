<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 14.04.2017
 * Time: 19:29
 */

namespace SkyCentrics\Cloud\Query;


use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Interface QueryInterface
 * @package SkyCentrics\Cloud\Query
 */
interface QueryInterface
{
    /**
     * @return RequestInterface
     */
    public function createRequest() : RequestInterface;

    /**
     * @param ResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response);
}