<?php

class WorkersController extends AdminController
{
	public function actionIndex()
	{
		$model = new Worker();
		$model->idMarket = Yii::app()->user->id;
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false)
	{
		if ($id !== false)
		{
			$model = $this->loadModel('Worker', $id);
		} else
		{
			$model = new Worker();
		}
	
		if(isset($_POST['Worker'])) {
			$model->attributes=$_POST['Worker'];
			$model->idMarket = Yii::app()->user->id;
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
				
				if ($model->idPlace == 1)
					$role = 'WorkerWarehouse';
				else 
					$role = 'WorkerTradingRoom';
				
				$connection=Yii::app()->db;
				$command=$connection->createCommand("REPLACE INTO AuthAssignment (itemname, userid, bizrule, data) VALUES ('".$role."', ".$model->id.", NULL, 'N;')");
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
	
		$this->render('item', array('model' => $model));
	}
	
	public function actionDelete($id) {
		Worker::model()->deleteByPk($id);
		
		$connection=Yii::app()->db;
		$command=$connection->createCommand("DELETE FROM AuthAssignment WHERE userid=".$id);
		$command->execute();
		
		$this->redirect($this->createUrl('/admin/workers/'));
	}
}
