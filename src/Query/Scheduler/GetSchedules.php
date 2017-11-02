<?php


namespace SkyCentrics\Cloud\Query\Scheduler;


use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;
use SkyCentrics\Cloud\Query\Device\AbstractDeviceQuery;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\DTO\Schedule\CloudSchedule;
/**
 * Class GetSchedules
 * @package SkyCentrics\Cloud\Query\Scheduler
 */
class GetSchedules extends AbstractDeviceQuery
{
    /**
     * @var AccountInterface
     */
    protected $account;

    /**
     * GetSchedules constructor.
     * @param AccountInterface $account
     */
    public function __construct(
        AccountInterface $account
    )
    {
        $this->account = $account;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => '/schedules/',
            'query' => ['auth' => $this->account->getAuth()]
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed|\SkyCentrics\Cloud\DTO\CloudDTOInterface
     */
    public function mapResponse(ResponseInterface $response)
    {
        $schedules = [];
        foreach ($response->getData() as $scheduleData){
            $schedules[] = $this->map(CloudSchedule::class, $scheduleData);
        }
        return $schedules;
    }

}