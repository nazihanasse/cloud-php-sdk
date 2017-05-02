<?php


namespace SkyCentrics\Cloud\Transport\Response;


use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Interface MultiResponseInterface
 * @package SkyCentrics\Cloud\Transport\Response
 */
interface MultiResponseInterface extends ResponseInterface, \Iterator
{
    /**
     * @return array
     */
    public function getResponses() : array;

    /**
     * @param \SkyCentrics\Cloud\Transport\Response\ResponseInterface $response
     * @return mixed
     */
    public function addResponse(ResponseInterface $response);
}