<?php
/**
 * Created by PhpStorm.
 * User: alexandr.mashukevich
 * Date: 10.5.18
 * Time: 17.39
 */

namespace SkyCentrics\Cloud\Query\Weather;


use SkyCentrics\Cloud\CloudInterface;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetWeather
 * @package SkyCentrics\Cloud\Query\Weather
 */
class GetWeather extends AbstractQuery
{
    /**
     * @var array
     */
    protected $query;

    /**
     * GetWeather constructor.
     * @param array $query
     */
    public function __construct(array $query = [])
    {
        $this->query = $query;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => '/weather/',
            'uri' => CloudInterface::SKYCENTRICS_IOT_URI,
            'query' => $this->query
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $response->getData();
    }

}