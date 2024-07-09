<?php

namespace Esimcard\EsimcardSdk\client_http;


use Exception;

class Sim
{

    private $apiClass;

    /**
     * @throws Exception
     */
    public function __construct($token,$sandbox)
    {
        $this->apiClass = new Api($token,$sandbox);
    }

    public function getEsims($page)
    {
        return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "my-esims", "GET", [], [
            "page" => $page,
        ]);
    }


    public function showSimDetails($id)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "my-esims/$id", "GET");
    }
    public function mySimUsage($id)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "my-sim/$id/usage", "GET");
    }
}
