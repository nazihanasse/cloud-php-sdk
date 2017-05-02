<?php


namespace SkyCentrics\Cloud\Query\Group;


use SkyCentrics\Cloud\DTO\CloudGroup;

/**
 * Class GroupMapperTrait
 * @package SkyCentrics\Cloud\Query\Group
 */
trait GroupMapperTrait
{
    /**
     * @param array $responseData
     * @return CloudGroup
     */
    public function fromResponse(array $responseData)
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
     * @param CloudGroup $group
     * @return array
     */
    public function toRequest(CloudGroup $group)
    {
        return [
            'i' => $group->getId(),
            'u' => $group->getUserId(),
            't' => 0,
            'n' => $group->getName(),
            'p' => $group->getParent()
        ];
    }
}