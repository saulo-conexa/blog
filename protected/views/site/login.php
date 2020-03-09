<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
	'Login',
);
?>

<div>

	<h1>Login</h1>

	<div class="form">
		<?php $form = $this->beginWidget('CActiveForm', array(
			'id' => 'login-form',
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
			),
		)); ?>

		<p class="note"><span class="required">*</span> Campos obrigatórios.</p>

		<div class="row">
			<?php echo $form->labelEx($model, 'email'); ?>
			<?php echo $form->textField($model, 'email'); ?>
			<?php echo $form->error($model, 'email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'senha'); ?>
			<?php echo $form->passwordField($model, 'senha'); ?>
			<?php echo $form->error($model, 'senha'); ?>
			<p class="hint">
				Para se cadastrar <a href="<?= $this->createUrl('site/contato') ?>">Entre em contato.</a>
				<br>Informando seu e-mail, senha e falando um pouco sobre você.
			</p>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Login'); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>

<style>
	div.form .hint {
		margin: 10px 0
	}
</style>