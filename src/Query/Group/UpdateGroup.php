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
 * Class UpdateGroup
 * @package SkyCentrics\Cloud\Query\Group
 */
class UpdateGroup extends AbstractQuery
{
    /**
     * @var CloudGroup
     */
    protected $group;

    /**
     * UpdateGroup constructor.
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
            'path' => sprintf('/groups/%s/', $this->group->getId()),
            'method' => Request::METHOD_PUT,
            'data' => $this->map($this->group)
        ]);
    }

    /**
     * @param ResponseInterface|MultiResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        // TODO: Implement mapResponse() method.
    }
}