<?php


namespace SkyCentrics\Cloud\Query\Group;


use SkyCentrics\Cloud\DTO\CloudGroup;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class CreateGroup
 * @package SkyCentrics\Cloud\Query\Group
 */
class CreateGroup extends AbstractQuery
{
    /**
     * @var CloudGroup
     */
    protected $group;

    /**
     * CreateGroup constructor.
     * @param CloudGroup $group
     */
    public function __construct(CloudGroup $group)
    {
        $this->group = $group;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => '/groups/',
            'method' => Request::METHOD_POST,
            'data' => $this->map($this->group)
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return int|null
     */
    public function mapResponse(ResponseInterface $response)
    {
        $id = $response->getIdFromLocation();

        $this->group->setId($id);

        return $id;
    }
}