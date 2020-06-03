<?php


namespace Bedivierre\Sberbank\Responses\GetOrderStatus;

/**
 * Class GetOrderStatusNameValuePair
 * @property string name
 * @property string value
 * @package Bedivierre\Sberbank\Responses\GetOrderStatus
 */
class GetOrderStatusNameValuePair extends \Bedivierre\Craftsman\Masonry\BaseDataObject
{
    public function __construct(string $name, string $value)
    {
        parent::__construct();
        $this->name = $name;
        $this->value = $value;
    }
}