<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\Device\CloudUserContacts;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class SetContacts
 * @package SkyCentrics\Cloud\Query\User
 */
class SetContacts extends AbstractQuery
{
    /**
     * @var CloudUserContacts
     */
    protected $userContacts;

    /**
     * @var int
     */
    protected $userId;

    /**
     * SetContacts constructor.
     * @param int $userId
     * @param CloudUserContacts $userContacts
     */
    public function __construct(
        int $userId,
        CloudUserContacts $userContacts
    )
    {
        $this->userId = $userId;
        $this->userContacts = $userContacts;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => sprintf('/users/%s/contacts', $this->userId),
            'method' => Request::METHOD_PUT,
            'data' => $this->map($this->userContacts)
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