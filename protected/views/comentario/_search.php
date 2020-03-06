<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'texto'); ?>
		<?php echo $form->textField($model, 'texto', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idPost'); ?>
		<?php echo $form->dropDownList($model, 'idPost', GxHtml::listDataEx(Post::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'qtdCurtidas'); ?>
		<?php echo $form->textField($model, 'qtdCurtidas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idUsuario'); ?>
		<?php echo $form->dropDownList($model, 'idUsuario', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
