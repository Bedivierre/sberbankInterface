<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;


use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * @property string $value
 * @property string $name
 * Class RegisterOrderItemDetails
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderItemDetailsElement extends BaseDataObject
{
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
        parent::__construct([]);
    }
}