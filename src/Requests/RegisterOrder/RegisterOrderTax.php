<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;

use Bedivierre\Craftsman\Masonry\BaseDataObject;
use Bedivierre\Sberbank\Requests\SB_Const;

/**
 * @property int taxType
 * @property int|null taxSum
 * Class RegisterOrderTax
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderTax extends BaseDataObject
{

    public function __construct(int $taxType = SB_Const::NDS_20, int $taxAmount = -1)
    {
        parent::__construct();
        $this->taxType = $taxType;
        if($taxAmount >= 0)
            $this->taxSum = $taxAmount;
    }
}