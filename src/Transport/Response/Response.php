<?php


namespace SkyCentrics\Cloud\Transport\Response;

use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class Response
 * @package SkyCentrics\Cloud\Transport\Response
 */
class Response implements ResponseInterface
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * Response constructor.
     * @param int $statusCode
     * @param array $data
     * @param RequestInterface $request
     */
    public function __construct(
        int $statusCode,
        array $data,
        RequestInterface $request
    )
    {
        $this->statusCode = $statusCode;
        $this->data = $data;
        $this->request = $request;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }
}