<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\User\CloudUserContacts;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class UpdateContacts
 * @package SkyCentrics\Cloud\Query\User
 */
class UpdateContacts extends AbstractQuery
{
    /**
     * @var int
     */
    protected $userId;

    /**
     * @var CloudUserContacts
     */
    protected $cloudUserContacts;

    /**
     * UpdateUserQuery constructor.
     * @param int $userId
     * @param CloudUserContacts $cloudUserContacts
     */
    public function __construct(
        int $userId,
        CloudUserContacts $cloudUserContacts
    )
    {
        $this->userId = $userId;
        $this->cloudUserContacts = $cloudUserContacts;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('users/%s/contacts', $this->userId),
            'method' => Request::METHOD_PUT,
            'data' => $this->map($this->cloudUserContacts),
            'headers' => [
                'Content-Type' => 'application/vnd.cloudbeam-v2+json',
                'Accept' => 'application/vnd.cloudbeam-v2+json'
            ]
        ]);
    }

    /**
     * @param ResponseInterface $response
     */
    public function mapResponse(ResponseInterface $response)
    {
        // TODO: Implement mapResponse() method.
    }
}