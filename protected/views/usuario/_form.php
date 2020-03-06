<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'usuario-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model, 'nome', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'nome'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'senha'); ?>
		<?php echo $form->textField($model, 'senha', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'senha'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sobre'); ?>
		<?php echo $form->textField($model, 'sobre', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'sobre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'linkExterno'); ?>
		<?php echo $form->textField($model, 'linkExterno', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'linkExterno'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('comentarios')); ?></label>
		<?php echo $form->checkBoxList($model, 'comentarios', GxHtml::encodeEx(GxHtml::listDataEx(Comentario::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('posts')); ?></label>
		<?php echo $form->checkBoxList($model, 'posts', GxHtml::encodeEx(GxHtml::listDataEx(Post::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->