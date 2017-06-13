<?php


namespace SkyCentrics\Cloud\Query\Organization;


use SkyCentrics\Cloud\Mapper\OrganizationMapper;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetOrganizationQuery
 * @package SkyCentrics\Cloud\Query\Organization
 */
class GetOrganization extends AbstractQuery
{
    /**
     * @var int
     */
    protected $organizationId;

    /**
     * GetOrganizationQuery constructor.
     * @param int $organizationId
     */
    public function __construct(
        int $organizationId
    )
    {
        $this->organizationId = $organizationId;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/organizations/%s/', $this->organizationId)
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed|\SkyCentrics\Cloud\DTO\CloudDTOInterface
     */
    public function mapResponse(ResponseInterface $response)
    {
        return OrganizationMapper::fromResponse($response->getData());
    }
}