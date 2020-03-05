<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="blog-content">
	<div class="welcome">
		<h2>Bem vindo ao nosso Blog.</h2>
		<p>Aqui você encontrará algumas informações sobre nossos sistema, e aprenderá a tirar o melhor proveira de uma gestão integrada.</p>
		<p>Abaixo estão algumas de nossas publicações recentes.</p>
	</div>
	<div class="post-list">
		<?php foreach($posts as $post): ?>
			<div class="post">
				<a href="<?=$this->createUrl('site/post', ['id' => $post->id])?>"><h3><?=$post->titulo?></h3></a>
				<p><a href="#" class="badge"><?=$post->categoria->titulo?></a></p>
				<p>
					<?=substr($post->texto,0,300)?>... &nbsp;&nbsp;<a href="<?=$this->createUrl('site/post', ['id' => $post->id])?>">Ler mais</a>
				</p>
				Escrito por: <a><?=$post->autor->nome?></a>
			</div>
		<?php endforeach; ?>
	</div>
</div>


<div id="side-column">
	<div class="categories">
		<ul>
			<li><a href="#">Agenda</a></li>
			<li><a href="#">Financeiro</a></li>
			<li><a href="#">Integrações</a></li>
			<li><a href="#">Parceiros</a></li>
			<li><a href="#">Serviços</a></li>
			<li><a href="#">Outros</a></li>
		</ul>
	</div>
</div>