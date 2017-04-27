<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 27.04.2017
 * Time: 10:02
 */

namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\Account;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

class CheckUserByEmail implements QueryInterface
{
    use UserMapperTrait;

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