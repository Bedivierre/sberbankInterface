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
class RegisterOrderRequest extends BaseRequest
{
    public function __construct(string $orderNumber, string $returnUrl = '', string $failUrl = '', int $sessionTimeout = -1, $testmode = null)
    {
        parent::__construct(SB_Config::$method_register_order, $testmode);
        $this->orderNumber = $orderNumber;
        $this->amount = 0;

        $this->setReturnUrl($returnUrl);
        $this->setFailUrl($failUrl);

        $this->setTimeout($sessionTimeout);

        $this->orderBundle = new RegisterOrderBundle();

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

    public function setCustomerDetails(string $address, string $contact, bool $isContactPhone = true,
                                       string $city = 'Санкт-Петербург', string $country = 'ru', string $fullName = ''){
        $this->orderBundle->setCustomerDetails($address, $contact, $isContactPhone,
            $city, $country, $fullName);
    }
    public function setOrderDate(int $orderCreationDate = -1)
    {
        if($orderCreationDate < 0)
            $orderCreationDate = time();
        $this->orderBundle->setDate($orderCreationDate);
    }

    public function addPosition(RegisterOrderPosition $pos)
    {
        $this->orderBundle->addPosition($pos);
        $this->recalculateAmount();
    }
    public function createPosition(string $name, string $itemCode, int $price,
                                   float $quantity, int $tax = SB_Const::NDS_20,
                                   int $paymentObject = SB_Const::PAYMENT_OBJECT_GOODS,
                                   int $paymentMethod = SB_Const::PAYMENT_ADVANCE_FULL,
                                   string $measure = 'шт')
    {
        $this->orderBundle->createPosition($name, $itemCode, $price,
            $quantity, $tax, $paymentObject, $paymentMethod, $measure);
        $this->recalculateAmount();
    }

    private function recalculateAmount()
    {
        $amount = 0;
        foreach ($this->orderBundle->cartItems->items as $i)
        {
            $amount += $i->itemAmount;
        }
        $this->amount = $amount;
    }

    protected function fetchData()
    {
        $ret = $this->copy();
        $ret->orderBundle = json_encode($this->orderBundle->toArray());
        return $ret;
    }

    /**
     * @return RegisterOrderResponse
     */
    public function doRequest()
    {
        return new RegisterOrderResponse(parent::doRequest());
    }

}