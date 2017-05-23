<?php


namespace SkyCentrics\Cloud\Transport\Response;

use SkyCentrics\Cloud\Transport\Request\RequestInterface;


/**
 * Class MultiResponse
 * @package SkyCentrics\Cloud\Transport\Response
 */
class MultiResponse implements MultiResponseInterface
{
    /**
     * @var array
     */
    protected $responses;

    /**
     * MultiResponse constructor.
     * @param array $responses
     */
    public function __construct(array $responses)
    {
        $this->responses = $responses;
    }
 /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return current($this->responses);
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        next($this->responses);
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return key($this->responses);
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
        return key($this->responses) !== null;
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        reset($this->responses);
    }

    /**
     * @return array
     */
    public function getResponses(): array
    {
        return $this->responses;
    }

    /**
     * @param \SkyCentrics\Cloud\Transport\Response\ResponseInterface $response
     * @return mixed
     */
    public function addResponse(ResponseInterface $response)
    {
        $this->responses[] = $response;
    }

    /**
     * @return null
     */
    public function getStatusCode()
    {
        return $this->current() instanceof ResponseInterface ? $this->current()->getStatusCode() : null;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->current() instanceof ResponseInterface ? $this->current()->getData() : [];
    }

    /**
     * @return RequestInterface|null
     */
    public function getRequest()
    {
        current($this->responses)->getRequest();
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->current() instanceof ResponseInterface ? $this->current()->getHeaders() : [];
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->current() instanceof ResponseInterface ? $this->current()->getBody() : null;
    }
}