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
    <p>Escrito por: <?=$post->autor->nome?> | <?=date('H:i d/m/Y',strtotime($post->dataPublicacao))?></p>
    <div class="post-content">
        <?=nl2br($post->texto)?>
    </div>
    <div class="comentarios">
        <br>
        <br>
        <br>
        <h3>Veja o que estão falando</h3>
        <br>
        <?php if(count($post->comentarios)): ?>
        <div class="comentarios-list">
            <?php foreach($post->comentarios as $comentario): ?>
                <div class="comentario-item">
                    <p><b><?=$comentario->usuario->nome?></b></p>
                    <p><?=$comentario->texto?></p>
                    <br>
                    <a class="like-button" href="#" title="Curtir">
                        <i class="fa fa-thumbs-up"></i>
                        <br> <?=$comentario->qtdCurtidas?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <p>Seja o primeiro a comentar.</p>
        <?php endif; ?>
        <br>
        <h4>Deixei aqui sua Opinião/Comentário</h4>
        <form action="">
            <textarea name="comentario" rows="6"></textarea>
        </form>
        <br>
        <br>
        <br>
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
            <a href="//<?=$post->autor->linkExterno?>" target="_blank">
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
        width: calc(100% - 22px);
        resize: vertical;
        min-height: 80px;
        padding: 10px
    }
    .comentarios-list .comentario-item {
        position: relative;
        padding: 15px;
    }
    .comentarios-list .comentario-item:nth-child(odd) {
        background: #efefef
    }
    .comentarios-list .comentario-item .like-button{
        position: absolute;
        right: 10px;
        top: 10px;
        text-align: center
    }
    .comentarios-list .comentario-item .like-button i{
        font-size: 21px;
    }
</style>
