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
    public function __construct($token)
    {
        $this->apiClass = new Api($token);
    }

    public function pricing()
    {
        return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "pricing", "GET");
    }

    public function balance()
    {
        return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "balance", "GET");
    }
    public function refill($amount, $cvv, $card_no, $country, $name_on_card, $expiry_date)
    {
        $json =
            [
                'amount' => $amount,
                'cvv' => $cvv,
                'card_no' => $card_no,
                'country' => $country,
                'name_on_card' => $name_on_card,
                'expiry_date' => $expiry_date,
            ];
        return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "refill", "POST",$json);
    }
}
