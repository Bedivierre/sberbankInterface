<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;

use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * @property string discountType
 * @property int discountValue
 * Class RegisterOrderDiscount
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderDiscount extends BaseDataObject
{
    public function __construct(int $value, string $type)
    {
        parent::__construct([]);
        $this->discountType = $type;
        $this->discountValue = $value;
    }
}