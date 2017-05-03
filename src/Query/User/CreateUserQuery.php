<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Mapper\UserMapper;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\src\Exception\QueryException;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class CreateUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class CreateUserQuery implements QueryInterface
{
    /**
     * @var CloudUser
     */
    protected $cloudUser;

    /**
     * CreateUserQuery constructor.
     * @param CloudUser $cloudUser
     * @throws QueryException
     */
    public function __construct(
        CloudUser $cloudUser
    )
    {
        if(!empty($cloudUser->getId())){
            throw new QueryException("You can't create user with ID.");
        }

        $this->cloudUser = $cloudUser;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => '/users/',
            'body' => UserMapper::toRequest($this->cloudUser)
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return int
     */
    public function mapResponse(ResponseInterface $response)
    {
        $id = (int)$response->getData()['id'];

        $this->cloudUser->setId($id);

        return $id;
    }
}