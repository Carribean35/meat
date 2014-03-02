<div class="login-form">
	<?php $form=$this->beginWidget('CActiveForm', array(
	    'id'=>'login-form',
	    'enableClientValidation'=>true,
	    'clientOptions'=>array(
	        'validateOnSubmit'=>true,
	    ),
	    'htmlOptions'=>array(
	        'class' => 'form-vertical login-form'
	    )
	)); ?>
		<input type="text" class="login-input login" name="LoginForm[username]">
		<input type="password" class="login-input password" name="LoginForm[password]">
		<input type="submit" class="login-form-submit" value="">
	<?php $this->endWidget(); ?>
</div>