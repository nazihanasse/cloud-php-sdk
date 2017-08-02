<?php


namespace SkyCentrics\Tests\Query\User;


use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\DTO\Device\CloudUserContacts;
use SkyCentrics\Cloud\Query\User\AuthorizeUser;
use SkyCentrics\Cloud\Query\User\CheckUserByEmail;
use SkyCentrics\Cloud\Query\User\GetContacts;
use SkyCentrics\Cloud\Query\User\GetUser;
use SkyCentrics\Cloud\Query\User\SetContacts;
use SkyCentrics\Cloud\Security\Account;
use SkyCentrics\Cloud\Test\CloudTest;

/**
 * Class UserApiTest
 * @package SkyCentrics\Tests\Query\User
 */
class UserApiTest extends CloudTest
{
    /**
     * @return mixed
     */
    public function testGetUser()
    {
        $userId = self::getUser()->getId();

        $cloudUser = self::$cloud->apply(new GetUser($userId));

        $this->assertInstanceOf(CloudUser::class, $cloudUser);
        $this->assertEquals($userId, $cloudUser->getId());

        return $cloudUser;
    }

    /**
     * @param CloudUser $cloudUser
     * @depends  testGetUser
     */
    public function testGetUserByEmail(CloudUser $cloudUser)
    {
        /** @var Account $cloudUserByEmail */
        $cloudUserByEmail = self::$cloud->apply(new CheckUserByEmail($cloudUser->getEmail()));

        $this->assertInstanceOf(Account::class, $cloudUserByEmail);
        $this->assertEquals($cloudUserByEmail->getEmail(), $cloudUser->getEmail());
    }

    /**
     * @param CloudUser $cloudUser
     * @depends testGetUser
     */
    public function testAuthorizeUser(CloudUser $cloudUser)
    {
        $cloudAthorizedUser = self::$cloud->apply(new AuthorizeUser(new Account($cloudUser->getEmail(), $cloudUser->getPassword())));

        $this->assertInstanceOf(CloudUser::class, $cloudAthorizedUser);
        $this->assertEquals($cloudAthorizedUser->getId(), $cloudUser->getId());
    }

    /**
     * @param CloudUser $cloudUser
     * @return CloudUser
     * @depends testGetUser
     */
    public function testGetContacts(CloudUser $cloudUser)
    {
        $userContacts = self::$cloud->apply(new GetContacts($cloudUser->getId()));

        $this->assertInstanceOf(CloudUserContacts::class, $userContacts);

        return $cloudUser;
    }

    /**
     * @param CloudUser $cloudUser
     * @depends testGetContacts
     */
    public function testSetContacts(CloudUser $cloudUser)
    {
        $email = 'test@test.com';

        self::$cloud->apply(new SetContacts($cloudUser->getId(), new CloudUserContacts([
            $email
        ])));

        /** @var CloudUserContacts $userContacts */
        $userContacts = self::$cloud->apply(new GetContacts($cloudUser->getId()));

        $this->assertContains($email, $userContacts->getPersonalEmails());
    }

    /**
     * @param CloudUser $cloudUser
     * @depends testGetUser
     */
    public function testUpdateUser(CloudUser $cloudUser)
    {
        $this->markTestIncomplete();
    }

    /**
     * @param CloudUser $cloudUser
     * @depends testGetUser
     */
    public function testDeleteUser(CloudUser $cloudUser)
    {
        $this->markTestIncomplete();
    }
}