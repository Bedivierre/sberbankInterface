<?php


namespace Bedivierre\Sberbank\Requests\GetOrderStatus;


use Bedivierre\Craftsman\Masonry\BaseDataObject;
use Bedivierre\Sberbank\Requests\BaseRequest;
use Bedivierre\Sberbank\Responses\GetOrderStatusResponse;
use Bedivierre\Sberbank\SB_Config;

/**
 * Class GetOrderStatusRequest
 * @property string orderId
 * @property string orderNumber
 * @package Bedivierre\Sberbank\Requests\GetOrderStatus
 */
class GetOrderStatusRequest extends BaseRequest
{
    public function __construct(string $identifier, bool $isOrderNumber = false, $testmode = null)
    {
        parent::__construct(SB_Config::$method_get_order_status, $testmode);
        if($isOrderNumber)
            $this->orderNumber = $identifier;
        else
            $this->orderId = $identifier;
    }


    /**
     * @return GetOrderStatusResponse
     */
    public function doRequest()
    {
        $ret = parent::doRequest();
        return new GetOrderStatusResponse($ret);
    }
}