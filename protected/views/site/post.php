<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = $post->titulo . ' | ' . Yii::app()->name;
$this->breadcrumbs=array(
	'Post',
);
?>

<div class="conteudo">
	<h1 class="titulo"><span><?=$post->titulo?></span></h1>
    <p>Escrito por: <a><?=$post->autor->nome?></a> | <?=date('H:i d/m/Y',strtotime($post->dataPublicacao))?></p>
    <div class="post-content">
        <?=nl2br($post->texto)?>
    </div>
    <div class="comentarios">
        <br>
        <br>
        <br>
        <h4>Deixei aqui sua Opinião/Comentário</h4>
        <form action="">
            <textarea name="comentario" rows="4"></textarea>
        </form>
        <br>
        <br>
        <br>
        <div>
            <?php foreach($post->comentarios as $comentario): ?>
                <p><?=$comentario->usuario->nome?></p>
                <p><?=$comentario->texto?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="column">
    <div class="autor">
        <h4>
            Sobre o Autor
        </h4>
        <p>
            <b><?=$post->autor->nome?></b>
        </p>
        <p>
            <a href="<?=$post->autor->linkExterno?>" target="_blank">
                <?=$post->autor->linkExterno?> <i class="fa fa-external-link"></i>
            </a>    
        </p>
        <p>
            <?=$post->autor->sobre?>
        </p>
    </div>
    <?php if(count($relacionadas)): ?>
    <div class="relateds">
        <h4>
            Notícias Relacionada
        </h4>
        <?php foreach($relacionadas as $p): ?>
            <a class="related-post" href="<?=$this->createUrl('site/post', ['id' => $p->id])?>">
                <b><?=$p->titulo?></b>
                <p>
                    <?=substr($p->texto,0,50)?>... <br><u>Ler mais</u>
                </p>
            </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<style>
    h1.titulo{
        border-bottom: 1px solid rgba(0, 0, 0, 0.4);
        line-height: 0;
        margin-bottom: 2rem
    }
    h1.titulo span{
        background: #fff;
        padding: 5px 30px 5px 5px;
    }
    .autor{
        text-align: center;
        margin-bottom: 40px
    }
    .autor b{
        font-size: 15px
    }
    .autor p{
        margin: 0 0 10px
    }
    .relateds h4{
        margin-bottom: 10px
    }
    .relateds .related-post{
        color: inherit !important
    }
    textarea {
        width: 100%;
    }
</style>
