<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = $post->titulo . ' | ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Post',
);
?>

<div class="conteudo">
    <h1 class="titulo"><span><?= $post->titulo ?></span></h1>
    <p>Escrito por: <?= $post->autor->nome ?> | <?= date('H:i d/m/Y', strtotime($post->dataPublicacao)) ?></p>
    <div class="post-content">
        <?= nl2br($post->texto) ?>
    </div>
    <div class="comentarios">
        <br>
        <br>
        <br>
        <h3>Veja o que estão falando</h3>
        <br>
        <?php if (count($post->comentarios)) : ?>
            <div class="comentarios-list">
                <?php foreach ($post->comentarios as $comentario) : ?>
                    <div class="comentario-item">
                        <p><b><?= $comentario->usuario->nome ?></b></p>
                        <p><?= $comentario->texto ?></p>
                        <br>
                        <a class="like-button" href="#" title="Curtir">
                            <i class="fa fa-thumbs-up"></i>
                            <br> <?= $comentario->qtdCurtidas ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Seja o primeiro a comentar.</p>
        <?php endif; ?>
        <br>
        <h4>Deixei aqui sua Opinião/Comentário</h4>
        <form class="form-comentario" action="/index.php?r=site/comentario" method="post">
            <textarea name="comentario" rows="6"></textarea>
            <?php if (Yii::app()->user->isGuest) : ?>
                <div class="textarea-overlay">
                    <p>Apenas usuário autenticados podem comentar.</p>
                    <a class="btn" href="<?= $this->createUrl('site/login') ?>">FAZER LOGIN</a>
                </div>
            <?php endif; ?>
            <button type="submit">Enviar Comentário</button>
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
            <b><?= $post->autor->nome ?></b>
        </p>
        <p>
            <a href="//<?= $post->autor->linkExterno ?>" target="_blank">
                <?= $post->autor->linkExterno ?> <i class="fa fa-external-link"></i>
            </a>
        </p>
        <p>
            <?= $post->autor->sobre ?>
        </p>
    </div>
    <?php if (count($relacionadas)) : ?>
        <div class="relateds">
            <h4>
                Notícias Relacionada
            </h4>
            <?php foreach ($relacionadas as $p) : ?>
                <a class="related-post" href="<?= $this->createUrl('site/post', ['id' => $p->id]) ?>">
                    <b><?= $p->titulo ?></b>
                    <p>
                        <?= substr($p->texto, 0, 50) ?>... <br><u>Ler mais</u>
                    </p>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<style>
    h1.titulo {
        border-bottom: 1px solid rgba(0, 0, 0, 0.4);
        line-height: 0;
        margin-bottom: 2rem
    }

    h1.titulo span {
        background: #fff;
        padding: 5px 30px 5px 5px;
    }

    .autor {
        text-align: center;
        margin-bottom: 40px
    }

    .autor b {
        font-size: 15px
    }

    .autor p {
        margin: 0 0 10px
    }

    .relateds h4 {
        margin-bottom: 10px
    }

    .relateds .related-post {
        color: inherit !important
    }

    .form-comentario {
        position: relative;
    }

    .form-comentario .textarea-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 4px;
        text-align: center;
        color: #fff;
        padding-top: 30px
    }

    .form-comentario .textarea-overlay a.btn {
        color: #fff;
        border: 1px solid;
        padding: 5px 10px;
        margin-top: 10px;
        border-radius: 4px;
        transition: .3s
    }

    .form-comentario .textarea-overlay a.btn:hover {
        background: rgba(255, 255, 255, 0.2)
    }

    .form-comentario textarea {
        width: calc(100% - 22px);
        resize: vertical;
        min-height: 80px;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .comentarios-list .comentario-item {
        position: relative;
        padding: 15px;
    }

    .comentarios-list .comentario-item:nth-child(odd) {
        background: #efefef
    }

    .comentarios-list .comentario-item .like-button {
        position: absolute;
        right: 10px;
        top: 10px;
        text-align: center
    }

    .comentarios-list .comentario-item .like-button i {
        font-size: 21px;
    }
</style>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<script src="<?= Yii::app()->request->baseUrl ?>/js/jquery-1.2.6.min.js"></script>
<?php if (Yii::app()->user->isGuest) : ?>
    <script>
        $('textarea').focus(function() {
            if (confirm('Apenas Usuários Autenticados podem comentar.')) {
                window.location.href = "<?= $this->createUrl('site/login') ?>"
            }
            $('textarea').blur()
        })
    </script>
<?php endif; ?>