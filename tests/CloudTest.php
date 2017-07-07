<?php


namespace SkyCentrics\Cloud\Test;

use SkyCentrics\Cloud\Annotation\AnnotationHandler;
use SkyCentrics\Cloud\Annotation\AnnotationMapper;
use SkyCentrics\Cloud\Annotation\AnnotationReader;
use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\Annotation\PropertyHandler;
use SkyCentrics\Cloud\Cloud;

use PHPUnit\Framework\TestCase;
use SkyCentrics\Cloud\CloudInterface;
use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Query\User\AuthorizeUser;
use SkyCentrics\Cloud\Security\Account;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Tests\Exception\CloudTestingExcpetion;

/**
 * Class CloudTest
 * @TODO: make Trait
 * @package SkyCentrics\Cloud\Test
 */
class CloudTest extends TestCase
{
    private static $testEmail = 'alexander.bondars@cactussoft.biz';
    private static $testPassword = 'scn12345';

    /**
     * @var CloudInterface
     */
    protected static $cloud;

    /**
     * @var AccountInterface
     */
    protected static $testAccount;

    /**
     * @var CloudUser
     */
    protected static $testUser;

    /**
     * @var AnnotationMapper
     */
    protected $annotationMapper;

    /**
     * Initial
     */
    public static function setUpBeforeClass()
    {
        if(!self::$cloud){
            self::$cloud = new Cloud();
        }

        if(!self::$testAccount && !self::$testUser){
            $cloud = self::$cloud;

            $existedAccount = new Account(
                self::$testEmail,
                md5(self::$testPassword)
            );

            self::$testAccount = $existedAccount;

            //try to authorize
            /** @var CloudUser $testUser */
            $testUser = $cloud->apply(new AuthorizeUser(self::$testAccount));

            if(!$testUser){
                throw new CloudTestingExcpetion(sprintf("Can't fund test user by email %s.", self::$testAccount->getEmail()));
            }

            self::$testUser = $testUser;
        }
    }

    /**
     * @return CloudInterface
     */
    protected function getCloud() : CloudInterface
    {
        return self::$cloud;
    }

    /**
     * @return AccountInterface
     */
    protected function getAccount() : AccountInterface
    {
        return self::$testAccount;
    }

    /**
     * @return CloudUser
     */
    protected function getUser() : CloudUser
    {
        return self::$testUser;
    }

    /**
     * @return AnnotationMapper
     */
    protected function getAnnotationMapper()
    {
        if(!$this->annotationMapper){
            $this->annotationMapper = new AnnotationMapper(
                new AnnotationReader(),
                new AnnotationHandler([
                    Property::class => new PropertyHandler()
                ])
            );
        }

        return $this->annotationMapper;
    }

    /**
     *
     */
    public static function tearDownAfterClass()
    {
        //@TODO: no need of tear down method
    }
}
