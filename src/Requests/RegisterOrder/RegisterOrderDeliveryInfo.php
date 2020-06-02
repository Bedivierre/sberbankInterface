<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;

/**
 * @property string deliveryType
 * @property string country
 * @property string city
 * @property string postAddress
 * Class RegisterOrderDeliveryInfo
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderDeliveryInfo extends \Bedivierre\Craftsman\Masonry\BaseDataObject
{
    public function __construct(string $address, string $country, string $city, string $type = '')
    {
        parent::__construct();
        if($type)
            $this->deliveryType = $type;
        $this->country = $country;
        $this->city = $city;
        $this->postAddress = $address;
    }
}