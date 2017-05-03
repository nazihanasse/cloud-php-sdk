<?php


namespace SkyCentrics\Cloud\Mapper;

use SkyCentrics\Cloud\DTO\CloudDTOInterface;


/**
 * Interface MapperInterface
 * @package SkyCentrics\Cloud\Query\User
 */
interface MapperInterface
{
    /**
     * @param array $responseData
     * @return mixed
     */
    public static function fromResponse(array $responseData) : CloudDTOInterface;

    /**
     * @param CloudDTOInterface $cloudDTO
     * @return array
     */
    public static function toRequest(CloudDTOInterface $cloudDTO) : array;
}