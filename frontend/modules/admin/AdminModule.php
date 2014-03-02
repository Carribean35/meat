<?php

class AdminModule extends CWebModule
{
	/**
	* Initializes the "reference" module.
	*/
	public function init()
	{
		// Set required classes for import.
		$this->setImport(array(
			'admin.components.*',
			'admin.controllers.*',
			'admin.models.*',
		));
	}
}
