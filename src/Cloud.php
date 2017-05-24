<?php


namespace SkyCentrics\Cloud;


use SkyCentrics\Cloud\Exception\CloudException;
use SkyCentrics\Cloud\Exception\CloudResponseException;
use SkyCentrics\Cloud\Query\MultiQuery;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Security\SecurityProvider;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\TransportInterface;

/**
 * Class Cloud
 * @package SkyCentrics\Cloud
 */
class Cloud implements CloudInterface
{
    /**
     * @var AccountInterface|null
     */
    protected $account;

    /**
     * @var Transport\HttpTransport|TransportInterface
     */
    protected $transport;

    /**
     * @var
     */
    protected $securityProvider;

    /**
     * Cloud constructor.
     * @param TransportInterface $transport
     * @param AccountInterface $account
     */
    public function __construct(
        TransportInterface $transport = null,
        AccountInterface $account = null
    )
    {
        $this->account = $account;
        $this->transport = $transport === null ? new Transport\GuzzleHttpTransport() : $transport;
        $this->securityProvider = new SecurityProvider();
    }

    /**
     * @param QueryInterface|array $query
     * @param AccountInterface|null $account
     * @return mixed
     * @throws CloudException
     */
    public function apply($query, AccountInterface $account = null)
    {
        if(is_array($query)){
            $query = new MultiQuery($query);
        }

        $request = $query->createRequest();

        $response = $this->transport->send($this->securityProvider->provide($request));

        if(!$query instanceof MultiQuery && $response instanceof MultiResponseInterface){
            $queryResult = [];

            foreach ($response as $responseItem){
                $queryResult[] = $query->mapResponse($response);
            }
        }else{

            $queryResult = $query->mapResponse($response);
        }

        return $queryResult;
    }

    /**
     * @param QueryInterface $query
     * @return RequestInterface
     * @throws CloudException
     */
    protected function createRequest(QueryInterface $query) : RequestInterface
    {
        $request = $query->createRequest();

        if(!$request instanceof RequestInterface){
            throw new CloudException(sprintf("Request must be instanced of %s!", RequestInterface::class));
        }

        return $request;
    }

}