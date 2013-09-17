<?php
/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class BlockGetzone extends Module
{
	public function __construct()
	{
		$this->name = 'blockgetzone';
		$this->tab = 'front_office_features';
		$this->version = 1.0;
		$this->author = 'PrestaShop';
		$this->need_instance = 0;

		parent::__construct();
		
		$this->displayName = $this->l('Getzone chat');
		$this->description = $this->l('Adds a block containing Getzone chat.');
	}

	public function install()
	{
		return parent::install() && $this->registerHook('header') && Configuration::updateValue('BLOCKGETZONE_USER', '');
	}

	public function getContent()
	{
		$output = '<h2>'.$this->displayName.'</h2>';
		if (Tools::isSubmit('submitGetzoneUser'))
		{
			if (!$getzoneUser = Tools::getValue('getzoneUser') OR empty($getzoneUser))
				$output .= '<div class="alert error">'.$this->l('Please fill in the Getzone username field.').'</div>';
			else
			{
				Configuration::updateValue('BLOCKGETZONE_USER', (string)($getzoneUser));
				$output .= '<div class="conf confirm"><img src="../img/admin/ok.gif" alt="'.$this->l('Confirmation').'" />'.$this->l('Settings updated').'</div>';
			}
		}
		return $output.$this->displayForm();
	}

	public function displayForm()
	{
		$output = '
		<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post">
			<fieldset><legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
				<label>'.$this->l('Getzone username').'</label>
				<div class="margin-form">
					<input type="text" name="getzoneUser" value="'.(string)(Configuration::get('BLOCKGETZONE_USER')).'" />
					<p class="clear">'.$this->l('Set the username for Getzone chat').'</p>
				</div>
				<center><input type="submit" name="submitGetzoneUser" value="'.$this->l('Save').'" class="button" /></center>
			</fieldset>
		</form>';
		return $output;
	}
	
	public function hookHeader($params)
	{
		global $smarty;

		$getzoneUser = (string)Configuration::get('BLOCKGETZONE_USER');
		if (empty($getzoneUser))
			return false;
		$smarty->assign('getzoneUser', $getzoneUser);

		//Tools::addJS(($this->_path).'blockgetzone.js');
		return $this->display(__FILE__, 'blockgetzone.tpl');

		
	}
}
