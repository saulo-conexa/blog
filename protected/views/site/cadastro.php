<?php

$this->pageTitle = 'Cadastre-se | ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Cadastre-se',
);

?>

<div class="conteudo">
    <?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'novoUsuario-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php 
        echo $form->errorSummary($model); 
	    $this->endWidget();
    ?>
    <?php if(Yii::app()->user->hasFlash('usuarioExistente')): ?>
        <div class="flash-error">
            <b>Ops... </b>
            <?= Yii::app()->user->getFlash('usuarioExistente') ?>
        </div>
    <?php endif; ?>
    <h1>Cadastre-se</h1>
    <form action="<?= $this->createUrl('site/cadastro') ?>" method="POST">
        <div class="fieldset">
            <label>Nome</label>
            <input required class="required" name="nome"/>
        </div>
        <div class="fieldset">
            <label>E-mail</label>
            <input type="email" required class="required" name="email"/>
        </div>
        <div class="fieldset">
            <label>Senha</label>
            <input type="password" required class="required" name="senha"/>
        </div>
        <div class="fieldset">
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>


<style>
    .fieldset {
        margin-bottom: 20px;
        font-size: 16px
    }

    .fieldset input,
    .fieldset label,
    .fieldset textarea {
        display: block;
        width: 100%;
        resize: vertical;
        padding: 5px;
        font-size: 16px
    }

    .fieldset label {
        margin-bottom: 5px
    }

    .fieldset select {
        background: #fff;
    }
</style>