<?php

/**
 * @author Daniel Gigel <daniel@gigel.ru>
 * @link http://Daniel.Gigel.ru/
 * Date: 20.03.2017
 * Time: 19:41
 */
class DnCallbackRequest extends ObjectModel
{
    public $id_request;
    public $type;
    public $url;
    public $email;
    public $phone;
    public $name;
    public $question;
    public $active;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'dncallback',
        'primary' => 'id_request',
        'fields' => array(
            'type' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true),
            'url' => array('type' => self::TYPE_STRING, 'required' => false),
            'email' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 32, 'required' => false),
            'phone' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 32),
            'name' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 32, 'required' => false),
            'question' => array('type' => self::TYPE_STRING, 'validate' => 'isMessage', 'size' => 9999, 'required' => false),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
        ),
    );
}