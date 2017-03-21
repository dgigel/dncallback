<?php

/**
 * DnCallback PrestaShop module main file.
 * @author Daniel Gigel <daniel@gigel.ru>
 * @link http://Daniel.Gigel.ru/
 * Date: 20.03.2017
 * Time: 18:20
 */

if (!defined('_PS_VERSION_'))
    exit;

include_once _PS_MODULE_DIR_ . 'dncallback/classes/DnCallbackRequest.php';

class DnCallback extends Module
{
    public function __construct()
    {
        $this->name = 'dncallback';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'Daniel.Gigel.ru';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.5.6');
        $this->secure_key = Tools::encrypt($this->name);

        parent::__construct();

        $this->displayName = 'Обратный звонок';
        $this->description = 'Добавляет две формы: "оставить заявку на обратный звонок" и "задать вопрос".';
    }

    public function install()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dncallback` (
			`id_request` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`type` ENUM("callback", "question") NOT NULL DEFAULT "callback",
			`url` VARCHAR(255) DEFAULT NULL,
			`email` varchar(128) DEFAULT NULL,
			`phone` VARCHAR(32) DEFAULT NULL,
			`name` varchar(32) NOT NULL,
			`question` text NOT NULL,
			`active` TINYINT(1) UNSIGNED NOT NULL DEFAULT "1",
			`date_add` DATETIME NOT NULL,
	        `date_upd` DATETIME NOT NULL
			) ENGINE=' . _MYSQL_ENGINE_;

        if (!Db::getInstance()->execute($sql))
            return false;

        if(!$this->installModuleTab('AdminDnCallback', 'Просьбы связаться', Tab::getIdFromClassName('AdminParentCustomer')))
            return false;

        if (!parent::install())
            return false;

        return $this->registerHook('header') && $this->registerHook('displayRightColumn');
    }

    public function uninstall()
    {
        $sql = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'dncallback`';

        if (!Db::getInstance()->execute($sql))
            return false;

        if (!$this->uninstallModuleTab('AdminDnCallback'))
            return false;

        return parent::uninstall();
    }

    public function hookDisplayHeader($params)
    {
        $this->context->controller->addJS(($this->_path) . 'js/dncallback.js');
        return '
        <script type="text/javascript">
				var urlDnCallbackController = "' . $this->context->link->getModuleLink('dncallback', 'callback', [], true) . '";
			</script>
        ';
    }

    public function hookDisplayRightColumn($params)
    {
        return $this->display(__FILE__, 'dncallback.tpl', $this->getCacheId());
    }

    /**
     * @param $tab_class
     * @param $tab_name
     * @param $id_tab_parent
     * @return mixed
     */
    private function installModuleTab($tab_class, $tab_name, $id_tab_parent)
    {
        $tab = new Tab();
        $tab->class_name = $tab_class;
        $tab->module = $this->name;
        $tab->id_parent = $id_tab_parent;

        $languages = Language::getLanguages();
        foreach ($languages as $lang)
            $tab->name[$lang['id_lang']] = $this->l($tab_name);

        return $tab->save();
    }

    /**
     * @param $tab_class
     * @return bool
     */
    private function uninstallModuleTab($tab_class)
    {
        $idTab = Tab::getIdFromClassName($tab_class);
        if ($idTab != 0) {
            $tab = new Tab($idTab);
            $tab->delete();
            return true;
        }
        return false;
    }

}