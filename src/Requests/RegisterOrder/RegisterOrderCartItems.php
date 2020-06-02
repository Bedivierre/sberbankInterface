<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;


use Bedivierre\Craftsman\Masonry\BaseDataObject;
use Bedivierre\Sberbank\Requests\SB_Const;

/**
 * @property RegisterOrderPosition[]|BaseDataObject items
 * Class RegisterOrderCartItems
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderCartItems extends BaseDataObject
{
    public function __construct()
    {
        parent::__construct([]);
        $this->items = new BaseDataObject();
    }

    public function addPosition(RegisterOrderPosition $pos)
    {
        if(!$this->_counter)
            $this->_counter = new BaseDataObject();
        if(!$this->_counter[$pos->itemCode])
            $this->_counter[$pos->itemCode] = 1;

        $p = false;
        foreach ($this->items as $k => $_p){
            if($_p->itemCode == $pos->itemCode){
                if($_p->name != $pos->name || $_p->itemPrice != $pos->itemPrice) {
                    $this->_counter[$pos->itemCode] += 1;
                    $pos->setItemCode( $pos->itemCode . "({$this->_counter[$pos->itemCode]})");
                } else {
                    $p = true;
                    $_p->setQuantity($_p->quantity->value + $pos->quantity->value);
                }
                break;
            }
        }
        if(!$p) {
            $pos->setPositionId($this->items->count());
            $this->items[] = $pos;
        }

    }
    public function createPosition(string $name, string $itemCode, int $price,
                                   float $quantity, int $tax = SB_Const::NDS_20,
                                   int $paymentObject = SB_Const::PAYMENT_OBJECT_GOODS,
                                   int $paymentMethod = SB_Const::PAYMENT_ADVANCE_FULL,
                                   string $measure = 'шт')
    {
        $this->addPosition(new RegisterOrderPosition( $name, $itemCode, $price,
                                $quantity, $tax, $paymentObject, $paymentMethod, $measure));
    }
}