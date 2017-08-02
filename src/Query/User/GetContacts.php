<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\Device\CloudUserContacts;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetContacts
 * @package SkyCentrics\Cloud\Query\User
 */
class GetContacts extends AbstractQuery
{
    /**
     * @var int
     */
    protected $userId;

    /**
     * GetContacts constructor.
     * @param int $userId
     */
    public function __construct(
        int $userId
    )
    {
        $this->userId = $userId;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/users/%s/contacts', $this->userId)
        ]);
    }

    /**
     * @param ResponseInterface|MultiResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $this->map(CloudUserContacts::class, $response->getData());
    }
}