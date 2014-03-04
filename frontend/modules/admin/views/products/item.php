<?php 
	$this->menuActiveItems[AdminController::PRODUCTS_MENU_ITEM] = 1;
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
			'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('/admin/products/')),
	
		)); ?>
			<div class="content-white-bg with-button">
			
				<div class="input-block-horizontal">
					<label>Продукция:</label>
					<?php echo $form->dropDownList($model,'idProduct', $products->getProducts(), array('class'=>'input input-medium select')); ?>
					<?php echo $form->error($model,'idProduct', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				<div class="input-block-horizontal">
					<label>Место:</label>
					<?php echo $form->dropDownList($model,'idPlace', $model->getPlace(), array('class'=>'input input-medium select')); ?>
					<?php echo $form->error($model,'idPlace', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				<div class="input-block-horizontal">
					<label>Цена:</label>
					<?php echo $form->textField($model,'price',array('class'=>'input input-small')); ?>
					<?php echo $form->error($model,'price', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				<div class="input-block-horizontal">
					<label>Измерение(кг):</label>
					<?php echo $form->textField($model,'measuring',array('class'=>'input input-small')); ?>
					<?php echo $form->error($model,'measuring', array('class' => 'error-message')); ?>
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
			$("#marketproduct-form").submit();
		})
	})
</script>