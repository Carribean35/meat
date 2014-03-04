
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
			'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('/warehouse/main/')),
	
		)); ?>
			<div class="content-white-bg with-button">
			
				<div class="input-block-horizontal">
					<label>Наименование продукции:</label>
					<?php echo $form->dropDownList($model,'idProduct', $products->getProducts(), array('class'=>'input input-medium select')); ?>
					<?php echo $form->error($model,'idProduct', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				<div class="input-block-horizontal">
					<label>Поставщик:</label>
					<?php echo $form->textField($model,'importer',array('class'=>'input input-medium')); ?>
					<?php echo $form->error($model,'importer', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				<div class="input-block-horizontal">
					<label>Вес:</label>
					<?php echo $form->textField($model,'weight',array('class'=>'input input-small')); ?>
					<?php echo $form->error($model,'weight', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>
				
				<div class="input-block-horizontal">
					<label>Цена за 1 кг:</label>
					<?php echo $form->textField($model,'price',array('class'=>'input input-small')); ?>
					<?php echo $form->error($model,'price', array('class' => 'error-message')); ?>
					<div class="clear"></div>
				</div>

				
				
			</div>
			<div class="button center-button" id="submitButton">Принять</div>
		
		<?php $this->endWidget(); ?>
		
	</div>
</div><!-- .content-->
<div class="content-shadow">
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#submitButton").on("click", function() {
			$("#importgoods-form").submit();
		})
	})
</script>