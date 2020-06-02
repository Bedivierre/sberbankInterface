<?php


namespace Bedivierre\Sberbank;


class SB_Config
{
    public static $host_test = 'https://3dsec.sberbank.ru/';
    public static $host_production = 'https://securepayments.sberbank.ru/';
    public static $cabinet_login = 'sampo_1-operator';
    public static $cabinet_password_test = 'sampo_1';
    public static $cabinet_password_production = 'hFn*285(tm22';
    public static $api_login = 'sampo_1-api';
    public static $api_password_test = 'sampo_1';
    public static $api_password_production = 'ee28%$LY?>';
    public static $orderSessionTimeout = 60; // 24*60*60;
    public static $defaultReturnUrl = '';
    public static $defaultFailUrl = '';
    public static $test_mode = true;

    public static $method_register_order = 'payment/rest/register.do';


    public static $default_measure_unit = 'шт';
}