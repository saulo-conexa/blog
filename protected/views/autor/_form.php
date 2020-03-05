<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'autor-form',
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
		<?php echo $form->labelEx($model,'linkExterno'); ?>
		<?php echo $form->textField($model, 'linkExterno', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'linkExterno'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sobre'); ?>
		<?php echo $form->textField($model, 'sobre', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'sobre'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('posts')); ?></label>
		<?php echo $form->checkBoxList($model, 'posts', GxHtml::encodeEx(GxHtml::listDataEx(Post::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->