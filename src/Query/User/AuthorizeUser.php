<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\User\CloudUser;
use SkyCentrics\Cloud\Mapper\UserMapper;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class AuthorizeUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class AuthorizeUser extends AbstractQuery
{
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
            'path' => '/users/',
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
        return $this->map(CloudUser::class, $response->getData());
    }
}