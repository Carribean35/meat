<?php
/**
 * BController class
 *
 * Has some useful methods for your Controllers
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class BController extends EController
{
	const DESKTOP_MENU_ITEM = "desktop";
	const ACCESS_MENU_ITEM = "access";
	const MARKET_MENU_ITEM = "market";
	
	public $meta_keywords = array();
	public $meta_description = array();
	public $breadcrumbs;
	public $breadcrumbs_button;
	public $menuActiveItems = array();
	public $title_h3;

}