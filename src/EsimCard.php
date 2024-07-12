<?php

namespace Esimcard\EsimcardSdk;

use Esimcard\EsimcardSdk\client_http\Package;
use Esimcard\EsimcardSdk\client_http\Pricing;
use Esimcard\EsimcardSdk\client_http\Sim;

class EsimCard {


    private  $priceClass;
    private  $packageClass;
    private  $simClass;

    const SANDBOX_ENABLED = true;
    const PRODUCTION_ENABLED = false;

    public function __construct($token,$sandbox = self::SANDBOX_ENABLED)
    {
        if ($sandbox != self::PRODUCTION_ENABLED && $sandbox != self::SANDBOX_ENABLED) {
            throw new \Exception('Sandbox or Production environment variable is not valid.');
        }
       $this->simClass = new Sim($token,$sandbox);
       $this->packageClass = new Package($token,$sandbox);
       $this->priceClass = new Pricing($token,$sandbox);
    }

    /**
     * @throws \Exception
     */
    public function pricing() {return $this->priceClass->pricing();}


    /**
     * @throws \Exception
     */
    public function balance(){return $this->priceClass->balance();}

    /**
     * @throws \Exception
     */
    public function myBundles($page = 1) {return  $this->packageClass->myBundles($page); }

    /**
     * @throws \Exception
     */
    public function myBundleDetail($id){return  $this->packageClass->myBundleDetail($id);}


    /**
     * @throws \Exception
     */
    public function packages($page =1, $id = null, $type = null, $package_type = null){return  $this->packageClass->packages($page, $id, $type, $package_type);}


    /**
     * @throws \Exception
     */
    public function packagePurchase($package_type_id , $sim_applied = true, $iccid = null){return  $this->packageClass->packagePurchase($package_type_id , $iccid,$sim_applied);}

    /**
     * @throws \Exception
     */
    public function voicePackagePurchase($zipcode , $first_name, $last_name, $address1, $city, $state, $package_type_id, $imei, $email, $street_number,$street_direction,$street_name,$contact_number, $address2 = null){return  $this->packageClass->voicePackagePurchase($zipcode , $first_name, $last_name, $address1, $city, $state, $package_type_id, $imei, $email, $street_number,$street_direction,$street_name,$contact_number, $address2);}

    /**
     * @throws \Exception
     */
    public function packagesByCountry($page = 1){return  $this->packageClass->packagesByCountry($page);}

    /**
     * @throws \Exception
     */
    public function packagesByCountryId($id){return  $this->packageClass->packagesByCountryId($id);}


    /**
     * @throws \Exception
     */
    public function packagesByContinent($page = 1){return  $this->packageClass->packagesByContinent($page);}
    public function packagesByContinentId($id){return  $this->packageClass->packagesByContinentId($id);}


    /**
     * @throws \Exception
     */
    public function globalPackages($page = 1){return  $this->packageClass->globalPackages($page);}

    /**
     * @throws \Exception
     */
    public function packageDetail($id){return  $this->packageClass->packageDetail($id);}

    /**
     * @throws \Exception
     */
    public function partners(){return  $this->packageClass->partners();}

    /**
     * @throws \Exception
     */
    public function partnerById($id){return  $this->packageClass->partnerById($id);}


    /**
     * @throws \Exception
     */
    public function networkCoverage(){return  $this->packageClass->networkCoverage();}


    /**
     * @throws \Exception
     */
    public function getEsims($page=1){return  $this->simClass->getEsims($page);}

    /**
     * @throws \Exception
     */
    public function showSimDetails($id){return $this->simClass->showSimDetails($id); }

    /**
     * @throws \Exception
     */
    public function mySimUsage($id){return $this->simClass->mySimUsage($id);}

}

