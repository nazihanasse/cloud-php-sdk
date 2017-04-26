<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 14.04.2017
 * Time: 19:41
 */

namespace SkyCentrics\Cloud\Transport;


use SkyCentrics\Cloud\Transport\Request\RequestInterface;

interface TransportInterface
{
    public function send(RequestInterface $request);
}