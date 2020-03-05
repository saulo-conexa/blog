<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = $post->titulo . ' | ' . Yii::app()->name;
$this->breadcrumbs=array(
	'Post',
);
?>

<div>
	<h1><?=$post->titulo?></h1>
    <div class="post-content">
        <?=nl2br($post->texto)?>
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
    .autor{
        text-align: center;
        margin-bottom: 40px
    }
    .autor h4{
        text-align: left
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
</style>
