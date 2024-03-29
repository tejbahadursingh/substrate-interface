<?php

namespace SubstrateInterfacePackage;

use SubstrateInterfacePackage\Rpc\Rpc;

class SubstrateInterface
{
    const API_URL = "http://127.0.0.1:8000";

    public $rpc, $tx, $token_symbol, $token_decimals;

    public $APIurl;

    public $httpMethod;

    /* Constuctor of the class which get call first*/
    public function __construct($APiURL = '', $websocket = 'None', $ss58_format = 'None', $type_registry = 'None', $type_registry_preset = 'None', $cache_region = 'None', $address_type = 'None', $runtime_config = 'None', $use_remote_preset = False)
    {
        if (!empty($APiURL)) {
            $this->APIurl = ($APiURL);
            $this->httpMethod = 'POST';
            $this->websocket = $websocket;
            $this->ss58_format = $ss58_format;
            $this->type_registry = $type_registry;
            $this->type_registry_preset = $type_registry_preset;
            $this->cache_region = $cache_region;
            $this->address_type = $address_type;
            $this->runtime_config = $runtime_config;
            $this->use_remote_preset = $use_remote_preset;
        }
        $rpc = new Rpc($this);
        $this->rpc = (object)[
            'rpc' => $rpc,
            'system' => $rpc->get_system()
        ];
       
        return $this;
    }


    /* Function which call any API through CRUL
    Input parameter :: URL, HTTP method (GET, POST..) and Body payload.
    Output :: API response
    */
    public function APIHandler($MethodName, $param = [], $id = 1)
    {
        /* Set input payload */
        $inputData = [
            "jsonrpc" => "2.0",
            "method" => $MethodName,
            "params" => $param,
            "id" => $id
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->APIurl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->httpMethod,
            CURLOPT_POSTFIELDS => json_encode($inputData),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
    
}
