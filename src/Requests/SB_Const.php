<?php


namespace Bedivierre\Sberbank\Requests;


class SB_Const
{

    const STATUS_NOT_PAID = 0;
    const STATUS_PAYMENT_DEPOSITED = 1;
    const STATUS_PAID = 2;
    const STATUS_CANCELLED = 3;
    const STATUS_REFUNDED = 4;
    const STATUS_EMITENT_AUTH = 5;
    const STATUS_DECLINED = 6;


    //========== Тип товаров
    /**
     * @var int Товар
     */
    const PAYMENT_OBJECT_GOODS = 1;
    /**
     * @var int  Подакцизный товар
     */
    const PAYMENT_OBJECT_EXSIZE = 2;
    /**
     * @var int  Работа
     */
    const PAYMENT_OBJECT_WORK = 3;
    /**
     * @var int  Услуга
     */
    const PAYMENT_OBJECT_SERVICE = 4;
    /**
     * @var int  Ставка азартной игры
     */
    const PAYMENT_OBJECT_BET = 5;
    /**
     * @var int  Выигрыш азартной игры
     */
    const PAYMENT_OBJECT_BET_WIN = 6;
    /**
     * @var int  Билет лотерейной игры
     */
    const PAYMENT_OBJECT_LOTTERY_TICKET = 7;
    /**
     * @var int  Выигрыш лотерейной игры
     */
    const PAYMENT_OBJECT_LOTTERY_WIN = 8;
    /**
     * @var int  Предоставление результатов интеллектуальной деятельности
     */
    const PAYMENT_OBJECT_INTELLECTUAL_WORK_PAYMENT = 9;
    /**
     * @var int  Платеж
     */
    const PAYMENT_OBJECT_PAYMENT = 10;
    /**
     * @var int  Агентское вознаграждение (комиссионные)
     */
    const PAYMENT_OBJECT_COMMISSIONS = 11;
    /**
     * @var int  Составной объект расчёта
     */
    const PAYMENT_OBJECT_COMPLEX_PAYMENT = 12;
    /**
     * @var int  Иной предмет расчёта
     */
    const PAYMENT_OBJECT_OTHER = 13;


    //========== Режимы налогообложения товаров

    const NDS_NO = 0;
    const NDS_0 = 1;
    const NDS_10 = 2;
    const NDS_10_110 = 4;
    const NDS_20 = 6;
    const NDS_20_120 = 7;


    //========== Медоты оплаты товаров
    /**
     * @var int  Полная предварительная оплата до момента передачи предмета расчёта
     */
    const PAYMENT_ADVANCE_FULL = 1;
    /**
     * @var int  Частичная предварительная оплата до момента передачи предмета расчёта
     */
    const PAYMENT_ADVANCE_PARTIAL = 2;
    /**
     * @var int  Аванс
     */
    const PAYMENT_ADVANCE = 3;
    /**
     * @var int  Полная оплата в момент передачи предмета расчёта
     */
    const PAYMENT_FULL_PAYMENT = 4;
    /**
     * @var int  Частичная оплата предмета расчёта в момент его передачи с последующей оплатой в кредит
     */
    const PAYMENT_PARTIAL_CREDIT = 5;
    /**
     * @var int  Передача предмета расчёта без его оплаты в момент его передачи с последующей оплатой в кредит
     */
    const PAYMENT_CREDIT_GIVE = 6;
    /**
     * @var int  Oплата предмета расчёта после его передачи с оплатой в кредит
     */
    const PAYMENT_CREDIT = 7;
}