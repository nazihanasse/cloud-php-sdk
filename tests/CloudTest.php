<?php


namespace SkyCentrics\Cloud\tests;

use SkyCentrics\Cloud\Cloud;

use PHPUnit\Framework\TestCase;

class CloudTest extends TestCase
{
    protected $cloud;

    protected function setUp()
    {
        $this->cloud = new Cloud();
    }

    protected function tearDown()
    {
        unset($this->cloud);
    }

    public function testApply()
    {

    }
}
