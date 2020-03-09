<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<a href="/">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/conexa.png" alt="">
			</a>
		</div>
		<div id="user-menu-container">
			<?php if(Yii::app()->user->isGuest): ?>
				<a href="/index.php?r=site/login">
					<i class="fa fa-user-circle"></i>
					<div class="user-info">
						<p>Olá Visitante!</p>
						<small>
							<u>Fazer Login</u>
						</small>
					</div>
				</a>
			<?php else: ?>
				<div>
					<i class="fa fa-user-circle" ></i>
					<div class="user-info">
						<span>Olá <?=explode(' ', Yii::app()->session->get('nomeUsuario'))[0]?>!</span>
						<br>
						<a href="/index.php?r=site/logout">
							<u>Sair</u>
						</a>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Sobre', 'url'=>array('/site/page', 'view'=>'about')),
				// array('label'=>'Contato', 'url'=>array('/site/contact')),
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> <br/>
		Todos os direitos reservados.<br/>
		Desenvolvido por <a href="http://conexa.app">Conexa.App</a>.
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
