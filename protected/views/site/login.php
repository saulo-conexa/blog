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

	<?php if (Yii::app()->user->hasFlash('usuarioCadasatrado')) : ?>
		<div class="flash-success">
			<b>Cadastrado com Sucesso:  </b>
			<?= Yii::app()->user->getFlash('usuarioCadasatrado') ?>
		</div>
	<?php endif; ?>

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
				Ainda não tem cadastro? <a href="<?= $this->createUrl('site/cadastro') ?>">Clique Aqui.</a>
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