<?php

class WarehouseController extends AdminController
{
	public function actionIndex()
	{
		$model = new ImportGoods();
		$model->idMarket = Yii::app()->user->idMarket;
		$model->idPlace = 1;
		$this->render('index', array('model' => $model));
	}
}