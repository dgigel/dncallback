<?php

class DnCallbackCallbackModuleFrontController extends ModuleFrontController
{
    public function displayAjax()
    {
        $ajax = Tools::getValue('ajax');
        if ($ajax) {

            $dn_request = new DnCallbackRequest();
            $dn_request->type = Tools::getValue('type');
            $dn_request->url = Tools::getValue('current_url');
            $dn_request->email = Tools::getValue('email');
            $dn_request->phone = Tools::getValue('phone');
            $dn_request->name = Tools::getValue('name');
            $dn_request->question = Tools::getValue('question');
            $dn_request->active = true;

            if ($dn_request->type == 'callback' && mb_strlen($dn_request->phone, 'UTF-8') > 0) {
                if ($dn_request->add()) {
                    die(Tools::jsonEncode(array(
                        'result' => true
                    )));
                }
            }
            if ($dn_request->type == 'question' && mb_strlen($dn_request->question, 'UTF-8') > 0) {
                if ($dn_request->add()) {
                    die(Tools::jsonEncode(array(
                        'result' => true
                    )));
                }
            }

            die(Tools::jsonEncode(array(
                'result' => false
            )));

        }

        Tools::redirect('index.php');
    }
}