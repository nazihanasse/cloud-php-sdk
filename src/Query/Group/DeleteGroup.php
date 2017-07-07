<?php


namespace SkyCentrics\Cloud\Query\Group;


use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class DeleteGroup
 * @package SkyCentrics\Cloud\Query\Group
 */
class DeleteGroup extends AbstractQuery
{
    /**
     * @var int
     */
    protected $groupId;

    /**
     * DeleteGroup constructor.
     * @param int $groupId
     */
    public function __construct(int $groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/groups/%s/', $this->groupId),
            'method' => Request::METHOD_DELETE
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