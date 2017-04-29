<?php


namespace SkyCentrics\Cloud\Transport\Response;


interface ResponseInterface
{
    public function getStatusCode();

    public function getData() : array;
}