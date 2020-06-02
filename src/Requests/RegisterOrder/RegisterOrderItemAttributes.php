<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;


use Bedivierre\Craftsman\Masonry\BaseDataObject;
use Bedivierre\Sberbank\Requests\SB_Const;

/**
 * Class RegisterOrderItemAttributes
 *
 *
 * @property RegisterOrderItemDetailsElement[]|BaseDataObject attributes
 * @property int paymentMethod
 * @property int paymentObject
 * @property string nomenclature Код товарной номенклатуры в шестнадцатеричном представлении с пробелами. Максимальная длина – 32 байта.
 * @property string userData Значение реквизита пользователя. Можно передавать только после согласования с ФНС.
 *
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderItemAttributes extends BaseDataObject
{
    public function __construct(
        int $paymentMethod = SB_Const::PAYMENT_ADVANCE_FULL,
        int $paymentObject = SB_Const::PAYMENT_OBJECT_GOODS,
        string $nomenclature = '',
        string $userData = '')
    {
        parent::__construct();
        $this->attributes = new BaseDataObject();
        $this->attributes[] = new RegisterOrderItemDetailsElement('paymentObject', $paymentObject);
        $this->attributes[] = new RegisterOrderItemDetailsElement('paymentMethod', $paymentMethod);

        if($nomenclature)
            $this->setNomenclature($nomenclature);
        if($userData)
            $this->setUserData($userData);
    }

    public function setNomenclature(string $nomenclature){
        $this->attributes[] = new RegisterOrderItemDetailsElement('nomenclature', $nomenclature);
    }
    public function setUserData(string $userData){
        $this->attributes[] = new RegisterOrderItemDetailsElement('userData', $userData);
    }
}