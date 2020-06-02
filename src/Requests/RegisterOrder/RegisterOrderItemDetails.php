<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;


use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * @property RegisterOrderItemDetailsElement[]|BaseDataObject itemDetailsParams
 * Class RegisterOrderItemDetails
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderItemDetails extends BaseDataObject
{
    public function __construct()
    {
        parent::__construct([]);
    }
    public function addDetailsElement(string $name, string $value)
    {
        if(!$this->itemDetailsParams)
            $this->itemDetailsParams = new BaseDataObject();
        $this->itemDetailsParams[] = new RegisterOrderItemDetailsElement($name, $value);
    }
}