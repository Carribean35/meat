<?php
/**
 *
 * MarketController class
 *
 */
class MarketController extends RController
{
	public function actionIndex()
	{
		$model = new Market();
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать магазин';
			$model = $this->loadModel('Market', $id);
			unset($model->password);
		} else  
		{
			$header = 'Добавить магазин';
			$model = new Market();
		}
		
		if(isset($_POST['Market'])) {
			$model->attributes=$_POST['Market'];
			$this->performAjaxValidation($model);
			if (!empty($model->confirmPassword) || empty($model->id)) {
				$model->password = crypt($model->password, $model->getSoult($model->password));
				$model->confirmPassword = $model->password;
			}
			if(empty($model->password))
				unset($model->password);
			
			if (empty($model->id)) {
				$ai = new Ai();
				$ai->save();
				$model->id = $ai->id;
			}
			
			if($model->save()) {
				$err = false;
				
				$connection=Yii::app()->db;
				$command=$connection->createCommand("REPLACE INTO AuthAssignment (itemname, userid, bizrule, data) VALUES ('MarketAdmin', ".$model->id.", NULL, 'N;')");
				$command->execute();
				
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
		
		$this->render('item', array('header' => $header, 'model' => $model));
	}
	
	public function actionDelete($id) {
		Market::model()->deleteByPk($id);
		
		$connection=Yii::app()->db;
		$command=$connection->createCommand("DELETE FROM AuthAssignment WHERE userid=".$id);
		$command->execute();
		
		$this->redirect($this->createUrl('market/index'));
	}
}