<?php


namespace SkyCentrics\Tests\Query\Group;


use SkyCentrics\Cloud\DTO\CloudGroup;
use SkyCentrics\Cloud\Query\Group\CreateGroup;
use SkyCentrics\Cloud\Query\Group\DeleteGroup;
use SkyCentrics\Cloud\Query\Group\GetGroup;
use SkyCentrics\Cloud\Query\Group\GetUserGroups;
use SkyCentrics\Cloud\Query\Group\UpdateGroup;
use SkyCentrics\Cloud\Query\Organization\GetOrganizationEntries;
use SkyCentrics\Cloud\Test\CloudTest;
use SkyCentrics\Cloud\Transport\Request\Request;

/**
 * Class GroupApiTest
 * @package SkyCentrics\Tests\Query\Group
 */
class GroupApiTest extends CloudTest
{
    /**
     * @return mixed
     */
    public function testCreate()
    {
        $createQuery = new CreateGroup(
            new CloudGroup('Group Name ' . time(), $this->getUser()->getId())
        );

        $groupId = $this->getCloud()->apply($createQuery);

        $this->assertInternalType('integer', $groupId);

        return $groupId;
    }

    /**
     * @param int $groupId
     * @return CloudGroup
     *
     * @depends testCreate
     */
    public function testGet(int $groupId)
    {
        /** @var CloudGroup $group */
        $group = $this->getCloud()->apply(new GetGroup($groupId));

        $this->assertInstanceOf(CloudGroup::class, $group);
        $this->assertEquals($groupId, $group->getId());
        $this->assertEquals($this->getUser()->getId(), $group->getUserId());
        $this->assertEquals(0, $group->getParent());

        return $group;
    }

    /**
     * @param CloudGroup $group
     *
     * @depends testGet
     */
    public function testFindInEntries(CloudGroup $group)
    {
        $entries = $this->getCloud()->apply(new GetOrganizationEntries($this->getUser()->getOrganization()));

        $this->assertArrayHasKey('groups', $entries);
        $this->assertNotEmpty($entries['groups']);

        $assert = true;

        /** @var CloudGroup $groupItem */
        foreach ($entries['groups'] as $groupItem){
            $this->assertInstanceOf(CloudGroup::class, $groupItem);

            if($groupItem->getId() === $group->getId()){
                $assert = false;
            }
        }

        $this->assertFalse($assert, "Entries doesn't contain this group.");
    }

    /**
     * @param CloudGroup $group
     *
     * @depends testGet
     */
    public function testUpdate(CloudGroup $group)
    {
        $time = time();

        $group->setName('New Group Name ' . $time);

        $this->assertEmpty(
            $this->getCloud()->apply(new UpdateGroup($group))
        );

        $updatedGroup = $this->getCloud()->apply(new GetGroup($group->getId()));

        $this->assertEquals($group->getName(), $updatedGroup->getName());
    }

    /**
     * @param CloudGroup $group
     *
     * @depends testGet
     */
    public function testDelete(CloudGroup $group)
    {
        $deleteGroupQuery = new DeleteGroup($group->getId());
        $request = $deleteGroupQuery->createRequest();

        $this->assertInstanceOf(Request::class, $request);

        $this->assertEquals(Request::METHOD_DELETE, $request->getMethod());
    }

    public function testGetUserGroups()
    {
        $account = $this->getUser()->getAccount();

        $result = $this->getCloud()->apply(new GetUserGroups($account));

        $this->assertNotEmpty($result);
        $this->assertInternalType('array', $result);

        foreach ($result as $group){
            $this->assertInstanceOf(CloudGroup::class, $group);
        }
    }
}