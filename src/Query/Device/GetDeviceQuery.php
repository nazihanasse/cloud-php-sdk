<?php


namespace SkyCentrics\Cloud\Query\Device;


use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

class GetDeviceQuery implements QueryInterface
{
    protected $account;

    protected $id;

    public function __construct(
        int $id = null,
        AccountInterface $account
    )
    {
        $this->id = $id;
        $this->account = $account;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {

    }

    /**
     * @param ResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        // TODO: Implement mapResponse() method.
    }
}