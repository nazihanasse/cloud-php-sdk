<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 27.04.2017
 * Time: 10:10
 */

namespace SkyCentrics\Cloud\Exception;


use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class CloudResponseException
 * @package SkyCentrics\Cloud\Exception
 */
class CloudResponseException extends CloudException
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var int
     */
    protected $statusCode;

    /**
     * CloudResponseException constructor.
     * @param ResponseInterface $response
     * @param string $message
     */
    public function __construct(ResponseInterface $response, $message = "")
    {
        $this->statusCode = $response->getStatusCode();
        $this->response = $response;

        parent::__construct($message);
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}