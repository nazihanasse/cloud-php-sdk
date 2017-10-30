<?php


namespace SkyCentrics\Cloud\Query\Scheduler;


use SkyCentrics\Cloud\Transport\Request\{
    MultiRequestInterface, Request, RequestInterface
};
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;
use SkyCentrics\Cloud\Query\Device\AbstractDeviceQuery;

/**
 * Class DeleteSchedule
 * @package SkyCentrics\Cloud\Query\Scheduler
 */
class DeleteSchedule extends AbstractDeviceQuery
{
    /**
     * @var int
     */
    protected $scheduleId;

    /**
     * DeleteSchedule constructor.
     * @param int $scheduleId
     */
    public function __construct(
        int $scheduleId
    )
    {
        $this->scheduleId = $scheduleId;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/schedules/%s/', $this->scheduleId),
            'method' => Request::METHOD_DELETE
        ]);
    }

    /**
     * @param ResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        // TODO: Implement mapResponse() method.
    }

}