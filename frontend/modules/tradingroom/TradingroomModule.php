<?php

class TradingroomModule extends CWebModule
{
	/**
	* Initializes the "Tradingroom" module.
	*/
	public function init()
	{
		// Set required classes for import.
		$this->setImport(array(
			'tradingroom.components.*',
			'tradingroom.controllers.*',
			'tradingroom.models.*',
		));
	}
}
