<?php


namespace SkyCentrics\Cloud\Mapper;


use SkyCentrics\Cloud\DTO\CloudDTOInterface;
use SkyCentrics\Cloud\DTO\CloudOrganization;
use SkyCentrics\Cloud\Exception\CloudMappingException;

/**
 * Class OrganizationMapper
 * @package SkyCentrics\Cloud\Mapper
 */
class OrganizationMapper implements MapperInterface
{

    /**
     * @param array $responseData
     * @return mixed
     */
    public static function fromResponse(array $responseData): CloudDTOInterface
    {
        $cloudOrganization = new CloudOrganization(
            $responseData['name'],
            $responseData['user']
        );

        $cloudOrganization->setId($responseData['id']);

        return $cloudOrganization;
    }

    /**
     * @param CloudDTOInterface $cloudOrganization
     * @return array
     * @throws CloudMappingException
     */
    public static function toRequest(CloudDTOInterface $cloudOrganization): array
    {
        if(!$cloudOrganization instanceof CloudOrganization){
            throw new CloudMappingException();
        }

        return [
            'id' => $cloudOrganization->getId(),
            'name' => $cloudOrganization->getName(),
            'user' => $cloudOrganization->getUser()
        ];
    }
}