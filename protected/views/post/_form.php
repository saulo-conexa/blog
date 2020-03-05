<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'post-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model, 'titulo', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'titulo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model, 'texto'); ?>
		<?php echo $form->error($model,'texto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'destaque'); ?>
		<?php echo $form->checkBox($model, 'destaque'); ?>
		<?php echo $form->error($model,'destaque'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'dataPublicacao'); ?>
		<?php echo $form->textField($model, 'dataPublicacao'); ?>
		<?php echo $form->error($model,'dataPublicacao'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idAutor'); ?>
		<?php echo $form->dropDownList($model, 'idAutor', GxHtml::listDataEx(Autor::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idAutor'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idCategoria'); ?>
		<?php echo $form->dropDownList($model, 'idCategoria', GxHtml::listDataEx(Categoria::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idCategoria'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('comentarios')); ?></label>
		<?php echo $form->checkBoxList($model, 'comentarios', GxHtml::encodeEx(GxHtml::listDataEx(Comentario::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->