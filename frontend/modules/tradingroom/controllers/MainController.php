<?php

class MainController extends TradingroomController
{
	public function actionIndex()
	{
		
		$products = new Product();
		
		$model = new ImportGoods();
		
		if(isset($_POST['ImportGoods'])) {
			$model->attributes=$_POST['ImportGoods'];
			$model->idMarket = Yii::app()->user->idMarket;
			$model->idPlace = 2;
			$this->performAjaxValidation($model);

			if($model->save()) {
				$err = false;
			} else {
				$err = true;
			}
			echo CJSON::encode(
				array(
					'error'=>$err,
				)
			);
			Yii::app()->end();
		}
		
		$this->render('index', array('products' => $products, 'model' => $model));
	}
}
