<?php
/* @var $this AutorController */
/* @var $model Autor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'autor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linkExterno'); ?>
		<?php echo $form->textField($model,'linkExterno',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'linkExterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sobre'); ?>
		<?php echo $form->textField($model,'sobre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sobre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->