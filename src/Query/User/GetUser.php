<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Mapper\UserMapper;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class GetUser extends AbstractQuery
{
    /**
     * @var
     */
    protected $id;

    /**
     * GetUserQuery constructor.
     * @param int $id
     */
    public function __construct(
        int $id
    )
    {
        $this->id = $id;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => '/users/' . $this->id . '/',
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
        return $this->map(CloudUser::class, $response);
    }
}