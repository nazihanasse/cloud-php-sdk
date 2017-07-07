<?php


namespace SkyCentrics\Cloud\Query\Organization;


use SkyCentrics\Cloud\DTO\CloudOrganization;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class UpdateOrganization
 * @package SkyCentrics\Cloud\Query\Organization
 */
class UpdateOrganization extends AbstractQuery
{
    /**
     * @var CloudOrganization
     */
    protected $organization;

    /**
     * UpdateOrganization constructor.
     * @param CloudOrganization $organization
     */
    public function __construct(
        CloudOrganization $organization
    )
    {
        $this->organization = $organization;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/organizations/%s/', $this->organization->getId()),
            'data' => $this->map($this->organization),
            'method' => Request::METHOD_PUT
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