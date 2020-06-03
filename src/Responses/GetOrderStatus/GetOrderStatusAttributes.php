<?php


namespace Bedivierre\Sberbank\Responses\GetOrderStatus;


use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class GetOrderStatusAttributes
 * @package Bedivierre\Sberbank\Responses\GetOrderStatus
 */
class GetOrderStatusAttributes extends BaseDataObject
{
    public function __construct(BaseDataObject $data)
    {
        parent::__construct();
        foreach ($data as $i){
            if(!$i->name && ! $i->value)
                continue;
            $this[] = new GetOrderStatusNameValuePair($i->name, $i->value);
        }
    }
}