<?php


namespace Bedivierre\Sberbank\Responses;


use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;
use Bedivierre\Craftsman\Aqueduct\REST\RestResponseObject;

/**
 * Class RegisterOrderResponse
 * @property string orderId
 * @property string formUrl
 * @property string errorCode
 * @property string errorMessage
 * @package Bedivierre\Sberbank\Responses
 */
class RegisterOrderResponse extends BaseResponse
{
    public function __construct(BaseResponseObject $response)
    {
        parent::__construct($response);

        if($response->errorCode){
            $this->setError($response->errorMessage, (int) $response->errorCode);
        }
    }
}