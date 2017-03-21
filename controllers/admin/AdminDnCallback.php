<?php

class AdminDnCallbackController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'dncallback';
        $this->identifier = 'id_request';
        $this->className = 'DnCallbackRequest';

        $this->allow_export = true;

        $this->addRowAction('view');
        $this->addRowAction('delete');

        $this->fields_list = array(
            'id_request' => array(
                'title' => 'ID',
                'width' => 100
            ),
            'type' => array(
                'title' => 'Тип',
                'width' => 100,
                'type' => 'select',
                'list' => array('callback' => 'Перезвонить', 'question' => 'Вопрос'),
                'filter_key' => 'a!type'
            ),
            'name' => array(
                'title' => 'Имя',
                'width' => 200,
                'align' => 'center',
                'orderby' => false,
                'filter' => false,
                'search' => true
            ),
            'phone' => array(
                'title' => 'Телефон',
                'width' => 200,
                'align' => 'center',
                'orderby' => false,
                'filter' => false,
                'search' => true
            ),
            'email' => array(
                'title' => 'E-mail',
                'width' => 200,
                'align' => 'center',
                'orderby' => false,
                'filter' => false,
                'search' => true
            ),
            'question' => array(
                'title' => 'Вопрос',
                'align' => 'center',
                'orderby' => false,
                'filter' => false,
                'search' => false
            ),
            'active' => array(
                'title' => 'Статус',
                'width' => 70,
                'active' => 'status',
                'align' => 'center',
                'orderby' => false,
                'type' => 'select',
                'list' => array(false => 'Закрыт', true => 'Открыт'),
                'filter_key' => 'a!active',
            ),
            'date_add' => array(
                'title' => 'Дата',
                'width' => 130,
                'align' => 'right',
                'type' => 'datetime',
                'filter_key' => 'a!date_add'
            ),
        );

        $this->bulk_actions = array(
            'delete' => array(
                'text' => 'Удалить выбранное',
                'confirm' => 'Вы уверены, что хотите удалить выбранные элементы?'
            )
        );

        parent::__construct();

    }

    public function renderView()
    {
        $id_request = Tools::getValue('id_request');
        $request = new DnCallbackRequest($id_request);

        $this->tpl_view_vars = array(
            'id_request' => $request->id,
            'type' => $request->type,
            'url' => $request->url,
            'email' => $request->email,
            'phone' => $request->phone,
            'name' => $request->name,
            'question' => $request->question,
            'active' => $request->active,
            'date_add' => $request->date_add
        );

        return parent::renderView();
    }
}