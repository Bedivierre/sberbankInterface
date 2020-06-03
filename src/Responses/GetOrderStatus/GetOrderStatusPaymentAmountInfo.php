<?php


namespace Bedivierre\Sberbank\Responses\GetOrderStatus;


use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class GetOrderStatusAttributes
 * @property string paymentState
 * @property int approvedAmount
 * @property int depositedAmount
 * @property int refundedAmount
 * @property int feeAmount
 *
 * @package Bedivierre\Sberbank\Responses\GetOrderStatus
 */
class GetOrderStatusPaymentAmountInfo extends BaseDataObject
{
    public function __construct(BaseDataObject $data)
    {
        parent::__construct($data);
    }
}