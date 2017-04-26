<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 26.04.2017
 * Time: 11:49
 */

namespace SkyCentrics\Cloud;


use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\TransportInterface;

/**
 * Class Cloud
 * @package SkyCentrics\Cloud
 */
class Cloud implements CloudInterface
{
    protected $account;

    protected $transport;

    /**
     * Cloud constructor.
     * @param TransportInterface $transport
     * @param AccountInterface $account
     */
    public function __construct(
        TransportInterface $transport,
        AccountInterface $account
    )
    {
        $this->account = $account;
        $this->transport = $transport;
    }

    /**
     * @param QueryInterface $query
     * @param AccountInterface|null $account
     * @return mixed
     */
    public function apply(QueryInterface $query, AccountInterface $account = null)
    {
        $request = $query->createRequest();



        $response = $this->transport->provide($request);

        $queryResult = $query->mapResponse($response);

        return $queryResult;
    }
}