<?php
require_once "../vendor/autoload.php";

use Bedivierre\Craftsman\Aqueduct\BaseRequestObject;
use Bedivierre\Sberbank\Requests\GetOrderStatus\GetOrderStatusRequest;
use Bedivierre\Sberbank\Requests\RegisterOrder\RegisterOrderPosition;
use Bedivierre\Sberbank\Requests\RegisterOrder\RegisterOrderRequest;
use Bedivierre\Sberbank\Requests\SB_Const;


$r = new GetOrderStatusRequest('38ed994d-aba3-794c-977c-f28f5e34c7dd');


$res = $r->doRequest();
echo $res->orderBundle->cartItems->items[0]->name;
die();


$r = new RegisterOrderRequest('22-test');
$r->setReturnUrl('https://sampo.shop');
$r->setFailUrl('https://sampo.shop/fail.php');
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