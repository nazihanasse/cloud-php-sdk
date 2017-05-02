<?php


namespace SkyCentrics\Cloud;


use SkyCentrics\Cloud\Exception\CloudException;
use SkyCentrics\Cloud\Exception\CloudResponseException;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Security\SecurityProvider;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\TransportInterface;

/**
 * Class Cloud
 * @package SkyCentrics\Cloud
 */
class Cloud implements CloudInterface
{
    const SKYCENTRICS_API_URI = 'http://api.skycentrics.com/api/';

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
        $this->transport = $transport === null ? new Transport\HttpTransport() : $transport;
        $this->securityProvider = new SecurityProvider();
    }

    /**
     * @param QueryInterface $query
     * @param AccountInterface|null $account
     * @return mixed
     * @throws CloudException
     */
    public function apply(QueryInterface $query, AccountInterface $account = null)
    {
        $request = $query->createRequest();

        if(!$request instanceof RequestInterface){
            throw new CloudException(sprintf("Request must be instanced of %s!", RequestInterface::class));
        }


        if($request instanceof MultiRequestInterface) {
            foreach ($request as $requestItem){
                $requestItem->setUri(self::SKYCENTRICS_API_URI);
            }

            $response = $this->transport->sendMulti($request);
        }else{
            $request->setUri(self::SKYCENTRICS_API_URI);

            $response = $this->transport->send($this->securityProvider->provide($request));
        }

        $queryResult = $query->mapResponse($response);

        return $queryResult;
    }
}