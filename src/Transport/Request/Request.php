<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 17.04.2017
 * Time: 13:02
 */

namespace SkyCentrics\Cloud\Transport\Request;

/**
 * Class Request
 * @package SkyCentrics\Cloud\Transport\Request
 */
class Request implements RequestInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var array
     */
    protected $query;

    /**
     * @var array
     */
    protected $data;

    /**
     * Request constructor.
     * @param string $uri
     * @param array $data
     * @param array $query
     * @param string $method
     * @param array $headers
     */
    public function __construct(string $uri, array $data =[], array $query = [], string $method = self::METHOD_GET, array $headers = [])
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->data = $data;

        $headers = array_merge([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ], $headers);

        $this->headers = $headers;
        $this->query = $query;
    }

    /**
     * @param array $params
     * @return RequestInterface
     */
    public static function createFromParams(array $params): RequestInterface
    {
        $params = array_merge([
            'uri' => '',
            'data' => [],
            'query' => [],
            'method' => self::METHOD_GET,
            'headers' => []
        ], $params);

        return new self(
            $params['uri'],
            $params['data'],
            $params['query'],
            $params['method'],
            $params['headers']
        );
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }
}