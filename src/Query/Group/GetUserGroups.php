<?php


namespace SkyCentrics\Cloud\Query\Group;


use SkyCentrics\Cloud\DTO\CloudGroup;
use SkyCentrics\Cloud\Mapper\GroupMapper;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetUserGroups
 * @package SkyCentrics\Cloud\Query\Group
 */
class GetUserGroups extends AbstractQuery
{
    /**
     * @var AccountInterface
     */
    protected $account;

    /**
     * GetUserGroups constructor.
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
           'path' => '/groups/',
           'query' => [
               'auth' => $this->account->getAuth()
           ]
       ]);
    }

    /**
     * @param ResponseInterface|MultiResponseInterface $response
     * @return CloudGroup[]
     */
    public function mapResponse(ResponseInterface $response)
    {
        $groups = [];
        foreach ($response->getData() as $groupData){
            $groups[] = $this->map(CloudGroup::class, $groupData);
        }

        return $groups;
    }
}