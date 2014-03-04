<?php
/* @var $this MarketController */
/* @var $model Market */

$this->title_h3=$header;

$this->breadcrumbs=array(
	'Магазины' => $this->createUrl('market/index'),
	$header
);

$this->menuActiveItems[BController::MARKET_MENU_ITEM] = 1;
?>
<div>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>$model->formId,
		'enableAjaxValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>false,
			'errorCssClass'=>'error',
			'afterValidate'=>'js:contentAfterValidate',
		),
		'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('market/index')),

	)); ?>

		<div class="control-group">
			<?php echo $form->label($model,'name',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($model,'name',array('class'=>'m-wrap large')); ?>
				<span class="help-inline"><?php echo $form->error($model,'name'); ?></span>	
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'login',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($model,'login',array('class'=>'m-wrap large')); ?>
				<span class="help-inline"><?php echo $form->error($model,'login'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'password',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->passwordField($model,'password',array('class'=>'m-wrap large')); ?>
				<span class="help-inline"><?php echo $form->error($model,'password'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'confirmPassword',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->passwordField($model,'confirmPassword',array('class'=>'m-wrap large')); ?>
				<span class="help-inline"><?php echo $form->error($model,'confirmPassword'); ?></span>
			</div>
		</div>
		
		<div class="form-actions large">
			<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
			<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
		</div>
		
		<?php echo $form->hiddenField($model,'id'); ?>

	<?php $this->endWidget(); ?>

</div>