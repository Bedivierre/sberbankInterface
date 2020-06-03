<?php


namespace Bedivierre\Sberbank\Responses\GetOrderStatus;


use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class GetOrderStatusAttributes
 * @property string bankCountryCode
 * @property string bankCountryName
 * @property string bankName
 *
 * @package Bedivierre\Sberbank\Responses\GetOrderStatus
 */
class GetOrderStatusBankInfo extends BaseDataObject
{
    public function __construct(BaseDataObject $data)
    {
        parent::__construct($data);
    }
}