<?php


namespace SkyCentrics\Tests\Query\Organization;


use SkyCentrics\Cloud\DTO\CloudGroup;
use SkyCentrics\Cloud\DTO\CloudOrganization;
use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\DTO\Device\AbstractCloudDevice;
use SkyCentrics\Cloud\Query\Organization\GetOrganization;
use SkyCentrics\Cloud\Query\Organization\GetOrganizationEntries;
use SkyCentrics\Cloud\Query\Organization\UpdateOrganization;
use SkyCentrics\Cloud\Test\CloudTest;

/**
 * Class OrganizationApiTest
 * @package SkyCentrics\Tests\Query\Organization
 */
class OrganizationApiTest extends CloudTest
{
    /**
     * @TODO: complete
     */
    public function testCreate()
    {
        $this->markTestIncomplete();
    }

    /**
     * @return CloudOrganization
     */
    public function testGetOrganization()
    {
        /** @var CloudUser $user */
        $user = $this->getUser();

        /** @var int $organizationId */
        $organizationId = $user->getOrganization();

        $this->assertInternalType('integer', $organizationId);

        /** @var CloudOrganization $organization */
        $organization = $this->getCloud()->apply(new GetOrganization($organizationId));

        $this->assertInstanceOf(CloudOrganization::class, $organization);
        $this->assertInternalType('integer', $organization->getId());
        $this->assertGreaterThan(0, $organization->getId());
        $this->assertInternalType('string', $organization->getName());
        $this->assertInternalType('integer', $organization->getUser());

        $this->assertEquals($this->getUser()->getId(), $organization->getUser());

        return $organization;
    }

    /**
     * @depends testGetOrganization
     */
    public function testOrganizationEntries(CloudOrganization $organization)
    {
        $entries = $this->getCloud()->apply(new GetOrganizationEntries($organization->getId()));

        $this->assertNotEmpty($entries);

        $this->assertArrayHasKey('users', $entries);

        foreach ($entries['users'] as $user){
            $this->assertInstanceOf(CloudUser::class, $user);
        }

        $this->assertArrayHasKey('groups', $entries);

        foreach ($entries['groups'] as $group){
            $this->assertInstanceOf(CloudGroup::class, $group);
        }

        $this->assertArrayHasKey('devices', $entries);

        foreach ($entries['devices'] as $device){
            $this->assertInstanceOf(AbstractCloudDevice::class, $device);
        }
    }

    /**
     * @depends testGetOrganization
     */
    public function testUpdate(CloudOrganization $organization)
    {
        $organization->setName('New Name ' . time());

        $this->assertEmpty(
            $this->getCloud()->apply(new UpdateOrganization($organization))
        );
    }

    /**
     * @TODO: complete
     */
    public function testDelete()
    {
        $this->markTestIncomplete();
    }
}