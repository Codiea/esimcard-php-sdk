<?php

namespace Esimcard\EsimcardSdk\client_http;

class Pricing
{
    /**
     * @var Api
     */
    private $apiClass;

    /**
     * @throws \Exception
     */
    public function __construct($token,$sandbox,$log)
    {
        $this->apiClass = new Api($token,$sandbox,$log);
    }

    public function pricing()
    {
        return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "pricing", "GET");
    }

    public function balance()
    {
        return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "balance", "GET");
    }

}
