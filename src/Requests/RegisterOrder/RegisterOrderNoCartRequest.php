<?php


namespace Bedivierre\Sberbank\Requests\RegisterOrder;

use Bedivierre\Craftsman\Masonry\BaseDataObject;
use Bedivierre\Sberbank\Requests\BaseRequest;
use Bedivierre\Sberbank\Requests\SB_Const;
use Bedivierre\Sberbank\Responses\RegisterOrderResponse;
use Bedivierre\Sberbank\SB_Config;

/**
 * Class RegisterOrderRequest
 *
 * @property string returnUrl
 * @property string failUrl
 * @property string orderNumber
 * @property int amount
 * @property int sessionTimeoutSecs
 * @property RegisterOrderBundle orderBundle
 * @package Bedivierre\Sberbank\Requests\RegisterOrder
 */
class RegisterOrderNoCartRequest extends BaseRequest
{
    public function __construct(string $orderNumber, int $amount, string $returnUrl = '', string $failUrl = '', int $sessionTimeout = -1, $testmode = null)
    {
        parent::__construct(SB_Config::$method_register_order, $testmode);
        $this->orderNumber = $orderNumber;
        $this->amount = 0;

        $this->setReturnUrl($returnUrl);
        $this->setFailUrl($failUrl);
        $this->setAmount($amount);
        $this->setTimeout($sessionTimeout);
    }

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    public function setReturnUrl(string $url = '')
    {
        if(!$url)
            $url = SB_Config::$defaultReturnUrl;
        $this->returnUrl = $url;
    }
    public function setFailUrl(string $url = '')
    {
        if(!$url)
            $url = SB_Config::$defaultFailUrl;
        if($url)
            $this->failUrl = $url;
    }
    public function setTimeout(int $sessionTimeout = -1)
    {
        if($sessionTimeout <= 0)
            $sessionTimeout = SB_Config::$orderSessionTimeout;
        $this->sessionTimeoutSecs = $sessionTimeout;
    }

    protected function fetchData()
    {
        $ret = $this->copy();
        return $ret;
    }

    /**
     * @return RegisterOrderResponse
     */
    public function doRequest($array = [])
    {
        return new RegisterOrderResponse(parent::doRequest());
    }

}