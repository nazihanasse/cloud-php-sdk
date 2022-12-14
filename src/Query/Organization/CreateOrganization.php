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
 * Class CreateOrganization
 * @package SkyCentrics\Cloud\Query\Organization
 */
class CreateOrganization extends AbstractQuery
{
    /**
     * @var CloudOrganization
     */
    protected $organization;

    /**
     * CreateOrganization constructor.
     * @param CloudOrganization $organization
     */
    public function __construct(CloudOrganization $organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => '/organizations/',
            'method' => Request::METHOD_POST,
            'data' => $this->map($this->organization)
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return int|null
     */
    public function mapResponse(ResponseInterface $response)
    {
        $organizationId = $response->getIdFromLocation();

        $this->organization->setId($organizationId);

        return $organizationId;
    }
}