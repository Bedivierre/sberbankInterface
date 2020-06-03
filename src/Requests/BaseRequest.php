<?php


namespace Bedivierre\Sberbank\Requests;


use Bedivierre\Craftsman\Aqueduct\REST\RestRequestObject;
use Bedivierre\Craftsman\Masonry\BaseDataObject;
use Bedivierre\Sberbank\SB_Config;

/**
 * @property string userName
 * @property string password
 *
 * Class BaseRequest
 * @package Bedivierre\Sberbank\Requests
 */
class BaseRequest extends RestRequestObject
{

    /**
     * @param string $sb_method API-метод, к которому обращается запрос.
     * @param bool|null $testmode Тестовый режим для запроса объекта. Если null, то оставляет значение, установленное в
     * SB_Config.php, иначе же переопределяет значение по умолчанию.
     */
    public function __construct($sb_method, $testmode = null)
    {
        $this->_testmode = is_null($testmode) ? (bool) SB_Config::$test_mode : (bool) $testmode;

        $host = $this->_testmode ? SB_Config::$host_test : SB_Config::$host_production;
        parent::__construct($host . $sb_method, 'post');
        $this->userName = SB_Config::$api_login;
        $this->password = $this->_testmode ? SB_Config::$api_password_test : SB_Config::$api_password_production;
    }

    /**
     * Возвращает проверку - является ли режим тестовым или нет.
     * @return bool
     */
    public function isTestmode(): bool
    {
        return $this->_testmode;
    }
    /**
     * Возвращает пароль для соединения с API Сбербанка.
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Возвращает логин для соединения с API Сбербанка.
     * @return string
     */
    public function getLogin(): string
    {
        return $this->userName;
    }

    public function getRequestData()
    {
        $ret = new BaseDataObject();
        $ret->userName = $this->getLogin();
        $ret->password = $this->getPassword();
        $fetch = $this->fetchData();
        $ret = $ret->merge($fetch);
        return $ret->toArray();
    }

    protected function fetchData()
    {
        return $this;
    }
}