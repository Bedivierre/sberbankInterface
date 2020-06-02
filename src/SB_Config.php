<?php


namespace Bedivierre\Sberbank;


class SB_Config
{
    public static $host_test = 'https://3dsec.sberbank.ru/';
    public static $host_production = 'https://securepayments.sberbank.ru/';
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

    public static $method_register_order = 'payment/rest/register.do';


    public static $default_measure_unit = 'шт';
}