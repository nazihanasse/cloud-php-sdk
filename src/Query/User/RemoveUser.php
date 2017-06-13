<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class RemoveUserQuery
 * @package SkyCentrics\Cloud\Query\User
 */
class RemoveUser extends AbstractQuery
{
    /**
     * @var int
     */
    protected $id;

    /**
     * RemoveUserQuery constructor.
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
            'path' => "/users/{$this->id}/"
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