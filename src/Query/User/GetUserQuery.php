<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 14.04.2017
 * Time: 19:30
 */

namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class GetUserQuery implements QueryInterface
{
    use UserMapperTrait;

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
            'url' => '/users/' . $this->id . '/'
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