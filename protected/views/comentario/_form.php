<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'comentario-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textField($model, 'texto', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'texto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idPost'); ?>
		<?php echo $form->dropDownList($model, 'idPost', GxHtml::listDataEx(Post::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idPost'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'qtdCurtidas'); ?>
		<?php echo $form->textField($model, 'qtdCurtidas'); ?>
		<?php echo $form->error($model,'qtdCurtidas'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php echo $form->dropDownList($model, 'idUsuario', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idUsuario'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->