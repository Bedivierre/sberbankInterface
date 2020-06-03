<?php


namespace Bedivierre\Sberbank\Responses;


use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;

class BaseResponse extends \Bedivierre\Craftsman\Aqueduct\REST\RestResponseObject
{
    public function __construct(BaseResponseObject $response)
    {
        parent::__construct([], $response->getUrl(), $response->getMethod());

        if($response->hasError()){
            $this->setError($response->errorMessage(), $response->errorCode());
            return;
        }

        $this->absorb($response);
    }
}