<?php


namespace SkyCentrics\Cloud\Transport\Request;

/**
 * Interface RequestInterface
 * @package SkyCentrics\Cloud\Transport\Request
 */
interface RequestInterface
{
    public static function createFromParams(array $params) : RequestInterface;

    public function getMethod() : string;

    public function getPath() : string;

    public function setPath(string $path);

    public function getUri() : string;

    public function setUri(string $uri);

    public function getHeaders() : array;

    public function setHeaders(array $headers);

    public function getData() : array;

    public function getQuery() : array;

    public function setQuery(array $query);
}