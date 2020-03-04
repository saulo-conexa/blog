<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destaque'); ?>
		<?php echo $form->textField($model,'destaque'); ?>
		<?php echo $form->error($model,'destaque'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dataPublicacao'); ?>
		<?php echo $form->textField($model,'dataPublicacao'); ?>
		<?php echo $form->error($model,'dataPublicacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idAutor'); ?>
		<?php echo $form->textField($model,'idAutor'); ?>
		<?php echo $form->error($model,'idAutor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCategoria'); ?>
		<?php echo $form->textField($model,'idCategoria'); ?>
		<?php echo $form->error($model,'idCategoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->