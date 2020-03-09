<?php

$this->pageTitle = 'Meus Dados | ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Meus Dados',
);

?>

<div class="conteudo">
    <?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'meusDados-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php
    echo $form->errorSummary($model);
    $this->endWidget();
    ?>
    <?php if (Yii::app()->user->hasFlash('atualizacaoSucesso')) : ?>
        <div class="flash-success">
            <?= Yii::app()->user->getFlash('atualizacaoSucesso') ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->hasFlash('atualizacaoErro')) : ?>
        <div class="flash-error">
            <b>Ops... </b>
            <?= Yii::app()->user->getFlash('atualizacaoErro') ?>
        </div>
    <?php endif; ?>
    <h1>Meus Dados</h1>
    <form action="<?= $this->createUrl('site/meusDados') ?>" method="POST">
        <div class="fieldset">
            <label>Nome</label>
            <input required name="nome"  value="<?=$usuario->nome?>" />
        </div>
        <div class="fieldset">
            <label>E-mail</label>
            <input readonly type="email" required name="email"  value="<?=$usuario->email?>" />
        </div>
        <div class="fieldset">
            <label>Link Externo</label>
            <input type="url" name="linkExterno"  value="<?=$usuario->linkExterno?>" />
        </div>
        <div class="fieldset">
            <label>Sobre</label>
            <input type="text" name="sobre"  value="<?=$usuario->sobre?>" />
        </div>
        
        <div class="fieldset">
            <button type="submit">Atualizar</button>
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