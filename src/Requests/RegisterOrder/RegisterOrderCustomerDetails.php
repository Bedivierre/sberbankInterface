<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;


use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class RegisterOrderCustomerDetails
 * @property RegisterOrderDeliveryInfo deliveryInfo
 * @property string phone
 * @property string email
 * @property string contact
 * @property string fullName
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderCustomerDetails extends BaseDataObject
{
    public function __construct(string $address, string $contact,
                                bool $isContactPhone = true,
                                string $fullName = '',
                                string $city = 'Санкт-Петербург',
                                string $country = 'ru')
    {
        parent::__construct([]);
        $this->deliveryInfo = new RegisterOrderDeliveryInfo($address, $country, $city, 'Курьер');

        if($isContactPhone) {
            $this->phone = $contact;
        }
        else {
            $this->email = $contact;
        }

        if($fullName)
            $this->fullName = $fullName;

    }
}