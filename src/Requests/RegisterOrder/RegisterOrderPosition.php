<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;


use Bedivierre\Craftsman\Masonry\BaseDataObject;
use Bedivierre\Sberbank\Requests\SB_Const;

/**
 * Class RegisterOrderPosition
 * @property string name
 * @property int positionId
 * @property string itemCode
 * @property int itemPrice
 * @property int itemAmount
 * @property bool _canDiscount
 * @property bool _useAmount
 *
 * @property RegisterOrderItemDetails itemDetails
 * @property RegisterOrderQuantity quantity
 * @property RegisterOrderDiscount discount
 * @property RegisterOrderItemAttributes itemAttributes
 * @property RegisterOrderTax tax
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderPosition extends BaseDataObject
{
    public function __construct(string $name,
                                string $itemCode, int $price,
                                float $quantity, int $tax = SB_Const::NDS_20,
                                int $paymentObject = SB_Const::PAYMENT_OBJECT_GOODS,
                                int $paymentMethod = SB_Const::PAYMENT_ADVANCE_FULL,
                                string $measure = 'шт', int $positionId = 0)
    {
        $this->setPositionId($positionId);
        $this->setItemCode($itemCode);
        $this->setName($name);
        $this->setPrice($price);
        $this->setQuantity($quantity, $measure);
        $this->setTax($tax);
        $this->setItemAttributes($paymentMethod, $paymentObject);

        parent::__construct([]);
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setPositionId(int $positionId)
    {
        $this->positionId = $positionId;
    }
    public function setQuantity(float $value, string $measure = '')
    {
        $this->quantity = new RegisterOrderQuantity($value, $measure);
        if($this->itemPrice)
            $this->itemAmount = (int) round($this->itemPrice * $this->quantity->value);
    }
    public function setPrice(int $price)
    {
        $this->itemPrice = $price;
        if($this->quantity)
            $this->itemAmount = (int) round($this->itemPrice * $this->quantity->value);
    }
    public function setItemCode(string $code)
    {
        $this->itemCode = $code;
    }
    public function setTax(int $tax, int $taxSum = -1)
    {
        $this->tax = new RegisterOrderTax($tax, $taxSum);
    }
    public function setDiscount(int $value, string $type)
    {
        $this->discount = new RegisterOrderDiscount($value, $type);
    }
    public function setItemAttributes(int $paymentMethod = -1, int $paymentObject = -1,
                                      string $nomenclature = '', string $userData = ''){
        $this->itemAttributes = new RegisterOrderItemAttributes($paymentMethod, $paymentObject, $nomenclature, $userData);
    }
    public function addItemDetails(string $name, string $value)
    {
        if(!$this->itemDetails)
            $this->itemDetails = new RegisterOrderItemDetails();
        $this->itemDetails->addDetailsElement($name, $value);
    }

}