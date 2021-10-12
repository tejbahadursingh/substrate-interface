<?php

namespace SubstrateInterfacePackage\Rpc;

use SubstrateInterfacePackage\SubstrateInterface;

class System
{
    const SYSTEM_PREFIX = 'system_';

    public $apiHandler;

    private $a;
    public function __construct(SubstrateInterface $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }

    /* system_chain endpoint API*/

    public function chain()
    {
        $response = json_decode($this->apiHandler->APIHandler(System::SYSTEM_PREFIX . __FUNCTION__));
        $result = ($response->result) ? ['status' => 1, 'data' => $response->result] : ['status' => 0, 'data' => $response->error];
        return json_encode($result);
    }

    /* system_chainType endpoint API*/

    public function chainType()
    {
        $response = json_decode($this->apiHandler->APIHandler(System::SYSTEM_PREFIX . __FUNCTION__));
        $result = ($response->result) ? ['status' => 1, 'data' => $response->result] : ['status' => 0, 'data' => $response->error];
        return json_encode($result);
    }

    /* system_health endpoint API*/

    public function health()
    {
        $response = json_decode($this->apiHandler->APIHandler(System::SYSTEM_PREFIX . __FUNCTION__));
        $result = ($response->result) ? ['status' => 1, 'data' => $response->result] : ['status' => 0, 'data' => $response->error];
        return json_encode($result);
    }
   
}
