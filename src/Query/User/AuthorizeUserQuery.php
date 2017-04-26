<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 14.04.2017
 * Time: 19:31
 */

namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class AuthorizeUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class AuthorizeUserQuery implements QueryInterface
{
    use UserMapperTrait;

    /**
     * @var AccountInterface
     */
    protected $account;

    /**
     * AuthorizeUserQuery constructor.
     * @param AccountInterface $account
     */
    public function __construct(
        AccountInterface $account
    )
    {
        $this->account = $account;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'url' => '/users/',
            'query' => [
                'auth' => base64_encode(sprintf("%s:%s", $this->account->getEmail(), $this->account->getPassword()))
            ],
            'headers' => [
                'Content-Type' => 'application/vnd.cloudbeam-v2+json',
                'Accept' => 'application/vnd.cloudbeam-v2+json'
            ]
        ]);
    }

    /**
     * @param ResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $this->fromResponse($response->getData());
    }
}