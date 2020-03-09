<?php

$this->pageTitle = 'Nova Publicação | ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Nova Publicação',
);

?>

<div class="conteudo">
    <?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'novoPost-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php 
        echo $form->errorSummary($model); 
	    $this->endWidget();
    ?>
    <h1>Nova Publicação</h1>
    <form action="<?= $this->createUrl('site/novoPost') ?>" method="POST">
        <div class="fieldset">
            <label>Título</label>
            <input required class="required" name="titulo" />
        </div>
        <div class="fieldset">
            <label>Categoria</label>
            <select required class="required" name="idCategoria">
                <option></option>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria->id ?>"><?= $categoria->titulo ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="fieldset">
            <label for="">Conteúdo da Publicação</label>
            <textarea required class="required" name="texto" rows="10"></textarea>
        </div>
        <div class="fieldset">
            <button type="submit">Criar Publicação</button>
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