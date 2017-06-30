<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Exception\CloudQueryException;
use SkyCentrics\Cloud\Mapper\UserMapper;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\src\Exception\QueryException;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class CreateUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class CreateUser extends AbstractQuery
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
            'data' => $this->map($this->cloudUser)
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     * @throws CloudQueryException
     */
    public function mapResponse(ResponseInterface $response)
    {
        $id = $response->getIdFromLocation();

        $this->cloudUser->setId($id);

        return $id;
    }
}