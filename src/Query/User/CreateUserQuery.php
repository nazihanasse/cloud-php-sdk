<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 14.04.2017
 * Time: 19:30
 */

namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class CreateUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class CreateUserQuery implements QueryInterface
{
    use UserMapperTrait;

    /**
     * @var CloudUser
     */
    protected $cloudUser;

    /**
     * CreateUserQuery constructor.
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
            'url' => '/users/',
            'body' => $this->toRequest($this->cloudUser)
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