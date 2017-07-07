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
 * Class GetGroup
 * @package SkyCentrics\Cloud\Query\Group
 */
class GetGroup extends AbstractQuery
{
    /**
     * @var int
     */
    protected $groupId;

    /**
     * GetGroup constructor.
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
            'path' => sprintf('/groups/%s/', $this->groupId)
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $this->map(CloudGroup::class, $response->getData());
    }
}