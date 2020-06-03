<?php


namespace Bedivierre\Sberbank\Responses\GetOrderStatus;


use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class GetOrderStatusAttributes
 * @property string maskedPan
 * @property string pan
 * @property string expiration
 * @property string cardholderName
 * @property string approvalCode
 * @property string chargeback
 * @property string paymentSystem
 * @property string product
 * @property string paymentWay
 *
 * @package Bedivierre\Sberbank\Responses\GetOrderStatus
 */
class GetOrderStatusCardAuthInfo extends BaseDataObject
{
    public function __construct(BaseDataObject $data)
    {
        parent::__construct();
        $this->absorb($data);
    }
}