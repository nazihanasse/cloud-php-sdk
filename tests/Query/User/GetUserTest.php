<?php


namespace SkyCentrics\Tests\Query\User;


use SkyCentrics\Cloud\DTO\User\CloudUser;
use SkyCentrics\Cloud\Query\User\GetUser;
use SkyCentrics\Cloud\Test\CloudTest;
use SkyCentrics\Cloud\Test\Fixtures\UserDataFixtures;
use SkyCentrics\Cloud\Transport\Response\Response;

/**
 * Class GetUserTest
 * @package SkyCentrics\Tests\Query\User
 */
class GetUserTest extends CloudTest
{
    public function testMapResponse()
    {
        $respMock = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->setMethods(['getData'])
            ->getMock();

        $respMock->method('getData')
            ->willReturn(UserDataFixtures::getUser());

        /** @var GetUser $getUserQueryMock */
        $getUserQueryMock = new GetUser(0);

        $getUserQueryMock->setAnnotationMapper($this->getCloud()->getAnnotationMapper());

        /** @var CloudUser $cloudUser */
        $cloudUser = $getUserQueryMock->mapResponse($respMock);

        $this->assertInstanceOf(CloudUser::class, $cloudUser);
    }
}