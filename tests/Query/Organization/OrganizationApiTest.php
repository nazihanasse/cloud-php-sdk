<?php


namespace SkyCentrics\Tests\Query\Organization;


use SkyCentrics\Cloud\DTO\CloudOrganization;
use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\Query\Organization\GetOrganization;
use SkyCentrics\Cloud\Query\Organization\GetOrganizationEntries;
use SkyCentrics\Cloud\Test\CloudTest;

class OrganizationApiTest extends CloudTest
{
    public function testCreate()
    {
        $this->markTestIncomplete();
    }

    public function testGet()
    {
        /** @var CloudUser $user */
        $user = $this->getUser();

        /** @var int $organizationId */
        $organizationId = $user->getOrganization();

        $this->assertInternalType('integer', $organizationId);

        /** @var CloudOrganization $organization */
        $organization = $this->getCloud()->apply(new GetOrganization($organizationId));

        $this->assertInstanceOf(CloudOrganization::class, $organization);

        return $organization;
    }

    /**
     * @depends testGet
     */
    public function testOrganizationEntries(CloudOrganization $organization)
    {
        $entries = $this->getCloud()->apply(new GetOrganizationEntries($organization->getId()));

        $this->assertNotEmpty($entries);

        $this->assertArrayHasKey('users', $entries);
        $this->assertArrayHasKey('groups', $entries);
        $this->assertArrayHasKey('devices', $entries);
    }

    public function testUpdate()
    {
        $this->markTestIncomplete();
    }

    public function testDelete()
    {
        $this->markTestIncomplete();
    }
}