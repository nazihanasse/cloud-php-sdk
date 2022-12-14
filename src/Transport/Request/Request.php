<?php


namespace SkyCentrics\Cloud\Transport\Request;
use SkyCentrics\Cloud\Cloud;
use SkyCentrics\Cloud\CloudInterface;

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
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var array
     */
    protected $query;

    /**
     * @var array|object
     */
    protected $data;

    /**
     * Request constructor.
     * @param string $path
     * @param array|object $data
     * @param array $query
     * @param string $method
     * @param array $headers
     * @param string $uri
     */
    public function __construct(string $path, $data =[], array $query = [], string $method = self::METHOD_GET, array $headers = [], $uri = CloudInterface::SKYCENTRICS_API_URI)
    {
        $this->uri = $uri;

        $this->path = $path;
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
            'path' => '',
            'data' => [],
            'query' => [],
            'method' => self::METHOD_GET,
            'headers' => [],
            'uri' => CloudInterface::SKYCENTRICS_API_URI
        ], array_filter($params));

        return new self(
            $params['path'],
            $params['data'],
            $params['query'],
            $params['method'],
            $params['headers'],
            $params['uri']
        );
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setUri(string $uri)
    {
        $this->uri = $uri;
    }

    public function getQuery(): array
    {
        return $this->query;
    }

    public function setQuery(array $query)
    {
        $this->query = $query;
    }
}