<?php


namespace SkyCentrics\Cloud\Query\Scheduler;


use SkyCentrics\Cloud\DTO\Schedule\CloudSchedule;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class UpdateSchedule
 * @package SkyCentrics\Cloud\Query\Group
 */
class UpdateSchedule extends AbstractQuery
{
    /**
     * @var CloudSchedule
     */
    protected $schedule;

    /**
     * CreateGroup constructor.
     * @param CloudSchedule $schedule
     */
    public function __construct(CloudSchedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf("/schedules/%s/", $this->schedule->getId()),
            'method' => Request::METHOD_PUT,
            'data' => $this->map($this->schedule)
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return int|null
     */
    public function mapResponse(ResponseInterface $response)
    {

    }
}