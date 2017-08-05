<?php


namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\User\CloudUserControl;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetControl
 * @package SkyCentrics\Cloud\Query\User
 */
class GetControl extends AbstractQuery
{
    /**
     * @var int
     */
    protected $userId;

    /**
     * GetControl constructor.
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
            'path' => sprintf("/users/%s/control", $this->userId)
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function mapResponse(ResponseInterface $response)
    {
        return $this->map(CloudUserControl::class, $response->getData());
    }
}