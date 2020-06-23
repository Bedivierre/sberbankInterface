<?php


namespace Bedivierre\Sberbank;


class SB_Config
{
    public static $host_test = 'https://3dsec.sberbank.ru/payment/';
    public static $host_production = 'https://securepayments.sberbank.ru/payment/';
    public static $cabinet_login = 'sampo_1-operator';
    public static $cabinet_password_test = 'sampo_1';
    public static $cabinet_password_production = 'hFn*285(tm22';
    public static $api_login = 'sampo_1-api';
    public static $api_password_test = 'sampo_1';
    public static $api_password_production = 'ee28%$LY?>';
    public static $orderSessionTimeout =  24*60*60;
    public static $defaultReturnUrl = 'https://sampo.shop';
    public static $defaultFailUrl = 'https://sampo.shop/fail.php';
    public static $test_mode = true;

    public static $method_register_order = 'rest/register.do';
    public static $method_get_order_status = 'rest/getOrderStatusExtended.do';


    public static $default_measure_unit = 'шт';
}