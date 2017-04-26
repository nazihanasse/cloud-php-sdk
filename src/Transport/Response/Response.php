<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 17.04.2017
 * Time: 13:03
 */

namespace SkyCentrics\Cloud\Transport\Response;

/**
 * Class Response
 * @package SkyCentrics\Cloud\Transport\Response
 */
class Response implements ResponseInterface
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var array
     */
    protected $data;

    /**
     * Response constructor.
     * @param int $statusCode
     * @param array $data
     */
    public function __construct(
        int $statusCode,
        array $data
    )
    {
        $this->statusCode = $statusCode;
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}