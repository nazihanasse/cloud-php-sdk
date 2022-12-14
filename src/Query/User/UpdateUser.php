<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\User\CloudUser;
use SkyCentrics\Cloud\Mapper\UserMapper;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class UpdateUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class UpdateUser extends AbstractQuery
{
    /**
     * @var CloudUser
     */
    protected $cloudUser;

    /**
     * UpdateUserQuery constructor.
     * @param CloudUser $cloudUser
     */
    public function __construct(
        CloudUser $cloudUser
    )
    {
        $this->cloudUser = $cloudUser;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => "/users/{$this->cloudUser->getId()}/",
            'method' => Request::METHOD_PUT,
            'data' => $this->map($this->cloudUser),
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
        return $this->cloudUser;
    }
}