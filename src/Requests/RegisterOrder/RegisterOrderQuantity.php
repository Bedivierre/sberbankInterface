<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;

use Bedivierre\Craftsman\Masonry\BaseDataObject;
use Bedivierre\Sberbank\SB_Config;

/**
 * @property float value
 * @property string measure
 * Class RegisterOrderQuantity
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderQuantity extends BaseDataObject
{
    public function __construct(float $amount, string $measure = 'шт')
    {
        parent::__construct();
        $this->value = round((float) $amount, 3);
        if($measure)
            $this->measure = $measure;
        if(!$this->measure)
            $this->measure = SB_Config::$default_measure_unit;
    }
}