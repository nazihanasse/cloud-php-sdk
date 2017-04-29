<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class UpdateUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class UpdateUserQuery implements QueryInterface
{
    use UserMapperTrait;

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
            'method' => 'PUT',
            'data' => $this->toRequest($this->cloudUser)
        ]);
    }

    /**
     * @param ResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        return;
    }
}