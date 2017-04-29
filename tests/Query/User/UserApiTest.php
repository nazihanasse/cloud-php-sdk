<?php


namespace SkyCentrics\Tests\Query\User;


use PHPUnit\Framework\TestCase;
use SkyCentrics\Cloud\Cloud;
use SkyCentrics\Cloud\CloudInterface;
use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Query\User\AuthorizeUserQuery;
use SkyCentrics\Cloud\Query\User\CheckUserByEmail;
use SkyCentrics\Cloud\Query\User\CreateUserQuery;
use SkyCentrics\Cloud\Query\User\GetUserQuery;
use SkyCentrics\Cloud\Security\Account;

/**
 * Class UserApiTest
 * @package SkyCentrics\Tests\Query\User
 */
class UserApiTest extends TestCase
{
    /**
     * @var CloudInterface
     */
    protected static $cloud;

    public function setUp()
    {
        if(empty(self::$cloud)){
            self::$cloud = new Cloud();
        }
    }

    public function testCreateUser()
    {
        $cloud = self::$cloud;

        $cloudUser = new CloudUser(
            'test_account@test.com',
            'scn54321'
        );

        $userId = $cloud->apply(new CreateUserQuery($cloudUser));

        $this->assertInternalType('int', $userId);

        return $userId;
    }

    /**
     * @param CloudUser $cloudUser
     * @depends testCreateUser
     */
    public function testGetUser(int $userId)
    {
        $cloudUser = self::$cloud->apply(new GetUserQuery($userId));

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
        $cloudUserByEmail = self::$cloud->apply(new CheckUserByEmail($cloudUser->getEmail()));

        $this->assertInstanceOf(CloudUser::class, $cloudUserByEmail);
        $this->assertEquals($cloudUserByEmail->getId(), $cloudUser->getId());
    }

    /**
     * @param CloudUser $cloudUser
     * @depends testCreateUser
     */
    public function testAuthorizeUser(CloudUser $cloudUser)
    {
        $cloudAthorizedUser = self::$cloud->apply(new AuthorizeUserQuery(new Account($cloudUser->getEmail(), $cloudUser->getPassword())));

        $this->assertInstanceOf(CloudUser::class, $cloudAthorizedUser);
        $this->assertEquals($cloudAthorizedUser->getId(), $cloudUser->getId());
    }

    /**
     * @param CloudUser $cloudUser
     * @depends testGetUser
     */
    public function testUpdateUser(CloudUser $cloudUser)
    {
        
    }

    /**
     * @param CloudUser $cloudUser
     * @depends testGetUser
     */
    public function testDeleteUser(CloudUser $cloudUser){}


}