<?php


namespace SkyCentrics\Cloud\Query\Organization;


use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class DeleteOrganization
 * @package SkyCentrics\Cloud\Query\Organization
 */
class DeleteOrganization extends AbstractQuery
{
    /**
     * @var int
     */
    protected $organizationId;

    /**
     * DeleteOrganization constructor.
     * @param int $organizationId
     */
    public function __construct(int $organizationId)
    {
        $this->organizationId = $organizationId;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/organizations/%s/', $this->organizationId),
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