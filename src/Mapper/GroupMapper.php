<?php


namespace SkyCentrics\Cloud\Mapper;


use SkyCentrics\Cloud\DTO\CloudDTOInterface;
use SkyCentrics\Cloud\DTO\CloudGroup;
use SkyCentrics\Cloud\Exception\CloudMappingException;

/**
 * Class GroupMapper
 * @package SkyCentrics\Cloud\Query\Group
 */
class GroupMapper implements MapperInterface
{
    /**
     * @param array $responseData
     * @return CloudDTOInterface
     */
    public static function fromResponse(array $responseData) : CloudDTOInterface
    {
        $group = new CloudGroup(
            $responseData['n'],
            $responseData['u'],
            $responseData['p']
        );

        $group->setId($responseData['i']);

        return $group;
    }

    /**
     * @param CloudDTOInterface $group
     * @return array
     * @throws CloudMappingException
     */
    public static function toRequest(CloudDTOInterface $group) : array
    {
        if(!$group instanceof CloudGroup){
            throw new CloudMappingException();
        }

        return [
            'i' => $group->getId(),
            'u' => $group->getUserId(),
            't' => 0,
            'n' => $group->getName(),
            'p' => $group->getParent()
        ];
    }
}