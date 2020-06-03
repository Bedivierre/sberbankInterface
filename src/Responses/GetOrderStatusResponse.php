<?php


namespace Bedivierre\Sberbank\Responses;


use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;
use Bedivierre\Craftsman\Aqueduct\REST\RestResponseObject;
use Bedivierre\Sberbank\Requests\RegisterOrder\RegisterOrderBundle;
use Bedivierre\Sberbank\Responses\GetOrderStatus\GetOrderStatusAttributes;
use Bedivierre\Sberbank\Responses\GetOrderStatus\GetOrderStatusBankInfo;
use Bedivierre\Sberbank\Responses\GetOrderStatus\GetOrderStatusCardAuthInfo;
use Bedivierre\Sberbank\Responses\GetOrderStatus\GetOrderStatusNameValuePair;
use Bedivierre\Sberbank\Responses\GetOrderStatus\GetOrderStatusTransactionAttributes;

/**
 * Class RegisterOrderResponse
 * @property string orderId
 * @property string orderNumber
 * @property string date
 * @property string orderDescription
 * @property string ip
 * @property string terminalId
 * @property int orderStatus
 * @property int amount
 * @property int currency
 * @property int actionCode
 * @property string actionCodeDescription
 * @property int errorCode
 * @property string errorMessage
 * @property GetOrderStatusAttributes|GetOrderStatusNameValuePair[] attributes
 * @property GetOrderStatusAttributes|GetOrderStatusNameValuePair[] merchantOrderParams
 * @property GetOrderStatusCardAuthInfo cardAuthInfo
 * @property GetOrderStatusBankInfo bankInfo
 * @property GetOrderStatusTransactionAttributes transactionAttributes
 * @property RegisterOrderBundle orderBundle
 * @package Bedivierre\Sberbank\Responses
 */
class GetOrderStatusResponse extends BaseResponse
{
    public function __construct(BaseResponseObject $response)
    {
        parent::__construct($response);

        if($response->errorCode){
            $this->setError($response->errorMessage, (int) $response->errorCode);
        }

        /*
        if($this->bankInfo)
            $this->bankInfo = new GetOrderStatusBankInfo($this->bankInfo);
        if($this->cardAuthInfo)
            $this->cardAuthInfo = new GetOrderStatusCardAuthInfo($this->cardAuthInfo);
        if($this->attributes)
            $this->attributes = new GetOrderStatusAttributes($this->attributes);
        if($this->merchantOrderParams)
            $this->merchantOrderParams = new GetOrderStatusAttributes($this->merchantOrderParams);
        if($this->transactionAttributes)
            $this->transactionAttributes = new GetOrderStatusAttributes($this->transactionAttributes);
        */
    }
}