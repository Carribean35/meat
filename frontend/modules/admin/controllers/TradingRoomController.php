<?php

class TradingRoomController extends AdminController
{
	public function actionIndex()
	{
		$model = new ImportGoods();
		$model->idMarket = Yii::app()->user->idMarket;
		$model->idPlace = 2;
		$this->render('index', array('model' => $model));
	}
}
