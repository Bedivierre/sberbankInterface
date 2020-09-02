<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;


use Bedivierre\Craftsman\Masonry\BaseDataObject;
use Bedivierre\Sberbank\Requests\SB_Const;

/**
 * @property RegisterOrderCustomerDetails customerDetails
 * @property RegisterOrderCartItems cartItems
 * @property string orderCreationDate
 * Class RegisterOrderBundle
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderBundle extends BaseDataObject
{
    public function __construct(int $orderCreationDate = -1, string $address = '', string $contact = '', bool $isContactPhone = true)
    {
        parent::__construct([]);

        $this->setDate($orderCreationDate);
        if($address || $contact)
            $this->setCustomerDetails($address, $contact, $isContactPhone);

        $this->cartItems = new RegisterOrderCartItems();

    }
    public function setCustomerDetails(string $address, string $contact, bool $isContactPhone = true,
                                       string $city = 'Санкт-Петербург', string $country = 'ru', string $fullName = ''){
        $this->customerDetails = new RegisterOrderCustomerDetails($address, $contact, $isContactPhone,
            $fullName, $city, $country);
    }
    public function setDate(int $orderCreationDate = -1)
    {
        if($orderCreationDate < 0)
            $orderCreationDate = time();
        $this->orderCreationDate = $orderCreationDate;
    }

    public function addPosition(RegisterOrderPosition $pos)
    {
        $this->cartItems->addPosition($pos);
    }
    public function createPosition(string $name, string $itemCode, int $price,
                                   float $quantity, int $tax = SB_Const::NDS_20,
                                   int $paymentObject = SB_Const::PAYMENT_OBJECT_GOODS,
                                   int $paymentMethod = SB_Const::PAYMENT_ADVANCE_FULL,
                                   string $measure = 'шт')
    {
        $this->cartItems->createPosition($name, $itemCode, $price,
            $quantity, $tax, $paymentObject, $paymentMethod, $measure);
    }
}