<?php


namespace SkyCentrics\Cloud\Mapper;


use SkyCentrics\Cloud\DTO\CloudDTOInterface;

class DeviceDataMapper implements MapperInterface
{

    /**
     * @param array $responseData
     * @return mixed
     */
    public static function fromResponse(array $responseData): CloudDTOInterface
    {
        // TODO: Implement fromResponse() method.
    }

    /**
     * @param CloudDTOInterface $cloudDTO
     * @return array
     */
    public static function toRequest(CloudDTOInterface $cloudDTO): array
    {
        // TODO: Implement toRequest() method.
    }
}