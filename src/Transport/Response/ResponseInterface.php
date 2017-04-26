<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 17.04.2017
 * Time: 12:49
 */

namespace SkyCentrics\Cloud\Transport\Response;


interface ResponseInterface
{
    public function getStatusCode();

    public function getData() : array;
}