<?php

class WarehouseModule extends CWebModule
{
	/**
	* Initializes the "Warehouse" module.
	*/
	public function init()
	{
		// Set required classes for import.
		$this->setImport(array(
			'warehouse.components.*',
			'warehouse.controllers.*',
			'warehouse.models.*',
		));
	}
}
