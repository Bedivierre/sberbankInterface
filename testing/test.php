<?php
require_once "../vendor/autoload.php";
require_once "conf.php";

use Bedivierre\Craftsman\Aqueduct\BaseRequestObject;
use Bedivierre\Sberbank\Requests\GetOrderStatus\GetOrderStatusRequest;
use Bedivierre\Sberbank\Requests\RegisterOrder\RegisterOrderNoCartRequest;
use Bedivierre\Sberbank\Requests\RegisterOrder\RegisterOrderPosition;
use Bedivierre\Sberbank\Requests\RegisterOrder\RegisterOrderRequest;
use Bedivierre\Sberbank\Requests\SB_Const;



$order = new RegisterOrderRequest('qwerty11214');
//$order->setCustomerDetails('SPB', "79657536601");
//
$i = new RegisterOrderPosition('Нужный товар', 'SA_1112331/SD', 15000,
      1, SB_Const::NDS_10, SB_Const::PAYMENT_OBJECT_GOODS,
        SB_Const::PAYMENT_FULL_PAYMENT);
$i->addItemDetails('mark', 'tbkal;kdhkajncfjkasdgbifjk;saf');

$order->addPosition($i);

$response = $order->doRequest();

if($response->errorMessage){
    echo "Ошибка при выполнении запроса: {$response->errorMessage}";
}

echo $response->formUrl . "\r\n";

$r = new GetOrderStatusRequest($response->orderId);

$res = $r->doRequest();
echo "===Item list===\r\n";
foreach ($res->orderBundle->cartItems->items as $item){
    echo $item->name;
}

die();


$r = new RegisterOrderRequest('22-test');
$r->setCustomerDetails('Тут', "79657536601");

$check = new BaseRequestObject('http://172.20.4.7/shopadmin/kassa_check.php4', 'get');
$check->kassa_nomer=8;
$check->check_nomer=1019865;
$cd = $check->doRequest();

//print_r($cd->toArray());

foreach ($cd->content as $l)
{
    $item = $l->line;
    $tax = $item->nds == 10 ? SB_Const::NDS_10 : SB_Const::NDS_20;
    $i = new RegisterOrderPosition($item->name, $item->idtov, $item->price, $item->klv, $tax);
    $i->addItemDetails('mark', $item->mark);

    if($item->sumline != $i->itemAmount)
        echo "Item '$i->name' have disruption in prices: sent $item->sumline, counted $i->itemAmount \n";

    $r->addPosition($i);
}
echo "Sum send: $cd->summa, sum calculated: $r->amount \n";

print_r($r->getRequestData());

echo $r->getHost() . "\n";

$ret = $r->doRequest();

if($ret->hasError())
    echo "Ошибка #" . $ret->errorCode() . ": " . $ret->errorMessage();
else
    echo "Ссылка на оплату: " . $ret->formUrl . ", идентификатор операции: " . $ret->orderId;