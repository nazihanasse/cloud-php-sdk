<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\Account;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class CheckUserByEmail
 * @package SkyCentrics\Cloud\Query\User
 */
class CheckUserByEmail implements QueryInterface
{
    use UserMapper;

    /**
     * @var string
     */
    protected $email;

    /**
     * GetUserByEmail constructor.
     * @param string $email
     */
    public function __construct(
        string $email
    )
    {
        $this->email = $email;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => '/users/',
            'query' => [
                'email' => base64_encode($this->email)
            ]
        ]);
    }

    /**
     * @param ResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        return new Account($response->getData()['n'], $response->getData()['a']);
    }
}