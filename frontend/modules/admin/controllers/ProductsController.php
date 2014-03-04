<?php

class ProductsController extends AdminController
{
	public function actionIndex()
	{
		$model = new MarketProduct();
		$model->idMarket = Yii::app()->user->id;
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false)
	{
		$products = new Product();
		
		if ($id !== false)
		{
			$model = $this->loadModel('MarketProduct', $id);
		} else
		{
			$model = new MarketProduct();
		}
		
		if(isset($_POST['MarketProduct'])) {
			$model->attributes=$_POST['MarketProduct'];
			$model->idMarket = Yii::app()->user->id;
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
		
		$this->render('item', array('products' => $products, 'model' => $model));
	}
	
	public function actionDelete($id) {
		MarketProduct::model()->deleteByPk($id);
		$this->redirect($this->createUrl('/admin/products/'));
	}
}
