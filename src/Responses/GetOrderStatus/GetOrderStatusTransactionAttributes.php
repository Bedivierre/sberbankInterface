<?php


namespace Bedivierre\Sberbank\Responses\GetOrderStatus;


use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class GetOrderStatusAttributes
 * @property string maskedPan
 * @property int expiration
 * @property string cardholderName
 * @property string approvalCode
 * @property string chargeback
 * @property string paymentSystem
 * @property string product
 * @property string paymentWay
 *
 * @package Bedivierre\Sberbank\Responses\GetOrderStatus
 */
class GetOrderStatusTransactionAttributes extends BaseDataObject
{
    public function __construct(BaseDataObject $data)
    {
        parent::__construct($data);
    }
}