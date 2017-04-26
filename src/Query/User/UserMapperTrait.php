<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 26.04.2017
 * Time: 14:58
 */

namespace SkyCentrics\Cloud\Query\User;


use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class UserMapperTrait
 * @package SkyCentrics\Cloud\Query\User
 */
trait UserMapperTrait
{
    /**
     * @param array $responseData
     * @return CloudUser
     */
    public function fromResponse(array $responseData)
    {
        $user = new CloudUser(
            $responseData['email'],
            $responseData['password']
        );

        $user->setControl($responseData['control']);
        $user->setOrganization($responseData['control']);
        $user->setSync($responseData['sync']);
        $user->setTimeZone($responseData['timezone']);
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
     * @param CloudUser $cloudUser
     * @return array
     */
    public function toRequest(CloudUser $cloudUser)
    {
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