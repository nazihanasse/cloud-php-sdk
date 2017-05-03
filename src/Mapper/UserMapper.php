<?php


namespace SkyCentrics\Cloud\Mapper;


use SkyCentrics\Cloud\DTO\CloudDTOInterface;
use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Exception\CloudMappingException;

/**
 * Class UserMapperTrait
 * @package SkyCentrics\Cloud\Query\User
 */
class UserMapper implements MapperInterface
{
    /**
     * @param array $responseData
     * @return CloudDTOInterface
     */
    public static function fromResponse(array $responseData) : CloudDTOInterface
    {
        $user = new CloudUser(
            $responseData['email'],
            $responseData['auth'],
            true
        );

        $user->setControl($responseData['control']);
        $user->setOrganization($responseData['organization']);
        $user->setSync($responseData['sync']);
        $user->setTimeZone(new \DateTimeZone($responseData['timezone']));
        $user->setCountry($responseData['address']['country']);
        $user->setZip($responseData['address']['zip']);
        $user->setCity($responseData['address']['city']);
        $user->setStreet($responseData['address']['street']);
        $user->setState($responseData['address']['state']);
        $user->setFirstName($responseData['name']['first']);
        $user->setLastName($responseData['name']['last']);
        $user->setId($responseData['id']);

        return $user;
    }

    /**
     * @param CloudDTOInterface $cloudUser
     * @return array
     * @throws CloudMappingException
     */
    public static function toRequest(CloudDTOInterface $cloudUser) : array
    {
        if(!$cloudUser instanceof CloudUser){
            throw new CloudMappingException();
        }

        return [
           'id' => $cloudUser->getId(),
           'auth' => $cloudUser->getPassword(),
           'email' => $cloudUser->getEmail(),
           'name' => [
               'firs' => $cloudUser->getFirstName(),
               'last' => $cloudUser->getLastName()
           ],
           'address' => [
               'street' => $cloudUser->getStreet(),
               'city' => $cloudUser->getCity(),
               'state' => $cloudUser->getState(),
               'zip' => $cloudUser->getZip(),
               'country' => $cloudUser->getCountry()
           ],
           'timezone' => $cloudUser->getTimeZone(),
           'sync' => $cloudUser->getSync(),
           'organization' => $cloudUser->getOrganization(),
           'control' => $cloudUser->getCountry()
       ];
    }
}