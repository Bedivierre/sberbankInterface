<?php


namespace Bedivierre\Sberbank\Responses;


use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

class BaseResponse extends \Bedivierre\Craftsman\Aqueduct\BaseResponseObject
{
    public function __construct(BaseResponseObject $response)
    {
        $data = new BaseDataObject([
            'headers' => $response->getAllHeaders(),
            'code'=> $response->getHttpCode(),
            'body'=> $response,
        ]);
        parent::__construct($data, $response->getUrl(), $response->getMethod());

        if($response->hasError()){
            $this->setError($response->errorMessage(), $response->errorCode());
            return;
        }

        $this->absorb($response, true, true);
    }
}