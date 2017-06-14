<?php


namespace SkyCentrics\Cloud\Transport\Request;

/**
 * Class MultiRequest
 * @package SkyCentrics\Cloud\Transport\Request
 */
class MultiRequest implements MultiRequestInterface
{
    /**
     * @var array
     */
    protected $requests;

    /**
     * MultiRequest constructor.
     * @param array $requests
     */
    public function __construct(array  $requests = [])
    {
        $this->requests = $requests;
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return current($this->requests);
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        next($this->requests);
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return key($this->requests);
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return key($this->requests) !== null;
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        reset($this->requests);
    }

    /**
     * @param array $params
     * @return RequestInterface
     */
    public static function createFromParams(array $params): RequestInterface
    {
        return Request::createFromParams($params);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->current() instanceof RequestInterface ? $this->current()->getMethod() : '';
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->current() instanceof RequestInterface ? $this->current()->getPath() : '';
    }

    /**
     * @param string $path
     * @return mixed
     */
    public function setPath(string $path)
    {
        return !$this->current() instanceof RequestInterface ?: $this->current()->setPath($path);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->current() instanceof RequestInterface ? '' : $this->current()->getUri();
    }

    /**
     * @param string $uri
     * @return mixed
     */
    public function setUri(string $uri)
    {
        return !$this->current() instanceof RequestInterface ?: $this->current()->setUri($uri);
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->current() instanceof RequestInterface ? [] : $this->current()->getHeaders();
    }

    /**
     * @param array $headers
     * @return mixed
     */
    public function setHeaders(array $headers)
    {
        return !$this->current() instanceof RequestInterface ?: $this->current()->setHeaders($headers);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->current() instanceof RequestInterface ? [] : $this->current()->getData();
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->current() instanceof RequestInterface ? [] : $this->current()->getQuery();
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function setQuery(array $query)
    {
        return !$this->current() instanceof RequestInterface ?: $this->current()->setQuery($query);
    }

    /**
     * @param RequestInterface $request
     */
    public function addRequest(RequestInterface $request)
    {
        $this->requests[] = $request;
    }

    /**
     * @return array
     */
    public function getRequests(): array
    {
        return $this->requests;
    }
}