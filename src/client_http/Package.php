<?php

namespace Esimcard\EsimcardSdk\client_http;

use Exception;

class Package
{
    private $apiClass;

    /**
     * @throws Exception
     */
    public function __construct($token)
    {
        $this->apiClass = new Api($token);
    }


    public function myBundles($page)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "my-bundles", "GET", [], [
             'page' => $page
         ]);
    }

    public function myBundleDetail($id)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "bundles/$id", "GET");
    }

    public function packages($page =1, $id = null, $type = null, $package_type = null)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "packages", "GET", [], [
             "page" => $page,
             "id" => $id,
             "type" => $type,
             "package_type" => $package_type,
         ]);
    }


    public function packagePurchase($package_type_id , $iccid)
    {
        $json = [
            "package_type_id" => $package_type_id,
            "iccid" => $iccid
        ];
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "package/purchase", "POST", $json);
    }


    public function voicePackagePurchase($zipcode , $first_name, $last_name, $address1, $city, $state, $package_type_id, $imei,$email,$street_number,$street_direction,$street_name,$contact_number,$address2 = null)
    {
        $json = [
            "package_type_id" => $package_type_id,
            "zipcode" => $zipcode,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address1" => $address1,
            "address2" => $address2,
            "city" => $city,
            "state" => $state,
            "imei" => $imei,
            "email" => $email,
            "street_number" => $street_number,
            "street_direction" => $street_direction,
            "street_name" => $street_name,
            "contact_number" => $contact_number,
        ];
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "package/date_voice_sms/purchase", "POST", $json);
    }


    public function packagesByCountry($page)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "packages/country", "GET",[], [
             'page' => $page
         ]);
    }


    public function packagesByCountryId($id)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "packages/country/$id", "GET");
    }


    public function packagesByContinent($page = 1)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "packages/continent", "GET",[],[
             'page' => $page
         ]);
    }


    public function packagesByContinentId($id)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "packages/continent/$id", "GET");
    }



    public function globalPackages($page = 1)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "packages/global", "GET",[],[
             'page' => $page
         ]);
    }


    public function packageDetail($id)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "package/detail/$id", "GET");
    }



    public function partners()
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "partners", "GET");
    }



    public function partnerById($id)
    {
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "partners/$id", "GET");
    }



    public function networkCoverage(){
         return $this->apiClass->makeRequest(__CLASS__ . "." . __FUNCTION__,  "network-coverages", "GET");
    }

}
