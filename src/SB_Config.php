<?php


namespace Bedivierre\Sberbank;


class SB_Config
{
    public static $host_test = 'https://3dsec.sberbank.ru/payment/';
    public static $host_production = 'https://securepayments.sberbank.ru/payment/';
    public static $cabinet_login = '';
    public static $cabinet_password_test = '';
    public static $cabinet_password_production = '';
    public static $api_login = '';
    public static $api_password_test = '';
    public static $api_password_production = '';
    public static $orderSessionTimeout =  24*60*60;
    public static $defaultReturnUrl = '';
    public static $defaultFailUrl = '';
    public static $test_mode = true;

    public static $method_register_order = 'rest/register.do';
    public static $method_get_order_status = 'rest/getOrderStatusExtended.do';


    public static $default_measure_unit = 'шт';
}