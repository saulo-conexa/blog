<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="blog-content">
	<div class="welcome">
		<h2>Bem vindo ao nosso Blog.</h2>
		<p>Aqui você encontrará algumas informações sobre nossos sistema, e aprenderá a tirar o melhor proveira de uma gestão integrada.</p>
		<p>Abaixo estão algumas de nossas publicações recentes que devem te ajudar a usar nossa plataforma.</p>
	</div>
	<?php if (count($posts)) : ?>
		<div class="post-list">
			<?php foreach ($posts as $post) : ?>
				<div class="post">
					<a href="<?= $this->createUrl('site/post', ['id' => $post->id]) ?>">
						<h3><?= $post->titulo ?></h3>
					</a>
					<p><a href="#" class="badge"><?= $post->categoria->titulo ?></a></p>
					<p>
						<?= substr($post->texto, 0, 300) ?>... &nbsp;&nbsp;<a href="<?= $this->createUrl('site/post', ['id' => $post->id]) ?>">Ler mais</a>
					</p>
					Escrito por: <?= $post->autor->nome ?> | <?= date('H:i d/m/Y', strtotime($post->dataPublicacao)) ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php else : ?>
		<h4>Ainda não há publicações dessa categoria.. :(</h4>
		<?php if (!Yii::app()->user->isGuest) : ?>
			<a href="<?= $this->createUrl('site/novoPost') ?>">Que tal escrever algo Sobre?</a>
		<?php endif; ?>
	<?php endif; ?>
</div>


<div id="side-column">
	<div class="custom-list">
		<p><b>Filtros</b></p>
		<form class="form-busca" action="/">
			<div class="input-group">
				<input type="text" name="q">
				<button type="submit"><i class="fa fa-search"></i></button>
			</div>
		</form>
		<p><b>Categorias</b></p>
		<ul>
			<?php foreach ($categorias as $categoria) : ?>
				<li>
					<a 
						<?php 
							if(isset($_GET['categoria']) && $_GET['categoria'] == $categoria->id) 
							echo 'class="active"'
						?>
							href="<?= $this->createUrl('site/index', ['categoria' => $categoria->id]) ?>">
						<?= $categoria->titulo ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>