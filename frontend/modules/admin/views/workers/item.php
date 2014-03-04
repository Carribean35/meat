<?php 
	$this->menuActiveItems[AdminController::WORKERS_MENU_ITEM] = 1;
?>
<?php $this->renderPartial('//../modules/'.Yii::app()->controller->module->id.'/views/partial/sidebar') ?>
<div class="gray-line"></div>
<div class="content">
	<div class="content-gray-bg">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>$model->formId,
			'enableAjaxValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>false,
				'errorCssClass'=>'error',
				'afterValidate'=>'js:contentAfterValidate',
			),
			'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('/admin/workers/')),
	
		)); ?>
			<div class="content-white-bg with-button">
			
				<div class="input-block-horizontal">
					<label>ФИО:</label>
					<?php echo $form->textField($model,'fio',array('class'=>'input input-medium')); ?>
					<?php echo $form->error($model,'fio', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				<div class="input-block-horizontal">
					<label>Паспортные данные:</label>
					<?php echo $form->textField($model,'pasport',array('class'=>'input input-medium')); ?>
					<?php echo $form->error($model,'pasport', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				<div class="input-block-horizontal">
					<label>Телефон:</label>
					<?php echo $form->textField($model,'phone',array('class'=>'input input-medium')); ?>
					<?php echo $form->error($model,'phone', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				<div class="input-block-horizontal">
					<label>Место:</label>
					<?php echo $form->dropDownList($model,'idPlace', $model->getPlace(), array('class'=>'input input-medium select')); ?>
					<?php echo $form->error($model,'idPlace', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				<div class="input-block-horizontal">
					<label>Логин:</label>
					<?php echo $form->textField($model,'login',array('class'=>'input input-medium')); ?>
					<?php echo $form->error($model,'login', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				<div class="input-block-horizontal">
					<label>Пароль:</label>
					<?php echo $form->passwordField($model,'password',array('class'=>'input input-medium')); ?>
					<?php echo $form->error($model,'password', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				<div class="input-block-horizontal">
					<label>Подтверждение пароля:</label>
					<?php echo $form->passwordField($model,'confirmPassword',array('class'=>'input input-medium')); ?>
					<?php echo $form->error($model,'confirmPassword', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				
			</div>
			<div class="button center-button" id="submitButton">Сохранить</div>
		
		<?php $this->endWidget(); ?>
		
	</div>
</div><!-- .content-->
<div class="content-shadow">
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#submitButton").on("click", function() {
			$("#worker-form").submit();
		})
	})
</script>