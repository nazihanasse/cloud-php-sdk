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
    protected $headers;

    /**
     * @var mixed
     */
    protected $body;

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
     * @param array $headers
     * @param string $body
     * @param RequestInterface $request
     */
    public function __construct(
        int $statusCode,
        array $headers,
        string $body,
        RequestInterface $request
    )
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
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
    public function getHeaders() : array
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return (array)json_decode($this->body, true);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }
}