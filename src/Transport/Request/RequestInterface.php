<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 14.04.2017
 * Time: 19:38
 */

namespace SkyCentrics\Cloud\Transport\Request;

/**
 * Interface RequestInterface
 * @package SkyCentrics\Cloud\Transport\Request
 */
interface RequestInterface
{
    public static function createFromParams(array $params) : self;

    public function getMethod() : string;

    public function getUri() : string;

    public function getHeaders() : array;

    public function setHeaders(array $headers);

    public function getData() : array;
}