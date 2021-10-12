<?php

namespace SubstrateInterfacePackage\Tests;

use SubstrateInterfacePackage\SubstrateInterface;
use SubstrateInterfacePackage\Exception;
use PHPUnit\Framework\TestCase;

class SubstrateInterfaceTest extends TestCase
{
    
    /** @test 
     * return system chain
     */
    public function testSystemChain()
    {

        $obj = new SubstrateInterface("http://127.0.0.1:8000");

        $expectedResultContainsPartial = 'Polkadot';
        $actualResult = json_decode($obj->rpc->system->chain());

        $this->assertContains($expectedResultContainsPartial, $actualResult->data);
    }

    /** @test 
     * return system chainType
     */
    public function testSystemChainType()
    {

        $obj = new SubstrateInterface("http://127.0.0.1:8000");

        $expectedResultContainsPartial = 'Live';
        $actualResult = json_decode($obj->rpc->system->chainType());

        $this->assertContains($expectedResultContainsPartial, $actualResult->data);
    }

    /** @test 
     * return system health
     */
    public function testSystemHealth()
    {

        $obj = new SubstrateInterface("http://127.0.0.1:8000");

        $actualResult = json_decode($obj->rpc->system->health());

        $this->assertNotEmpty($actualResult->data);
    }

    
}
