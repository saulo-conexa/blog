<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array(
				'allow',
				'actions' => array('index', 'login', 'post', 'cadastro'),
				'users' => array('*'),
			),
			array(
				'allow', // allow authenticated users to access all actions
				'users' => array('@'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$criteria = new CDbCriteria;
		
		$idCategoria = isset($_GET['categoria']) ? $_GET['categoria'] : false;
		if ($idCategoria) {
			$criteria->addCondition('idCategoria=:idCategoria', 'AND');
			$criteria->params = array(
				':idCategoria' => $idCategoria,
			);
		}

		if (isset($_GET['q'])) {
			$criteria->addSearchCondition("titulo", $_GET['q'], true, 'OR');
			$criteria->addSearchCondition("texto", $_GET['q'], true, 'OR');
		}
		
		$posts = Post::model()->findAll($criteria); // $params não é necessario

		$criteriaCategoria = new CDbCriteria();
		$criteriaCategoria->order = 'ordem asc, id asc';
		$categorias = Categoria::model()->findAll($criteriaCategoria); // $params não é necessario

		$this->render('index', array(
			'posts' => $posts,
			'categorias' => $categorias,
		));
	}

	public function actionNovoPost()
	{
		$criteriaCategoria = new CDbCriteria();
		$criteriaCategoria->order = 'ordem asc, id asc';
		$categorias = Categoria::model()->findAll($criteriaCategoria); // $params não é necessario
		$model = new Post;

		if (!empty($_POST)) {
			$data = [
				'titulo' => $_POST['titulo'],
				'texto' => $_POST['texto'],
				'destaque' => '0',
				'dataPublicacao' => date('Y-m-d H:i:s'),
				'idCategoria' => $_POST['idCategoria'],
				'idUsuario' => Yii::app()->session->get('idUsuario'),
			];

			$model->setAttributes($data);
			if ($model->save()) {
				Yii::app()->user->setFlash('postEnviado', 'Obrigado pela contribuição :)');
				$id = $model->id;
				$this->redirect($this->createUrl('site/post', ['id' => $id]));
			}
		}

		$this->render('novoPost', [
			'model' => $model,
			'categorias' => $categorias,
		]);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the post page
	 */
	public function actionPost()
	{
		$id = $_GET['id'];
		$post = Post::model()->findByPk($id);
		$criteria = new CDbCriteria;
		$criteria->addCondition('id!=:id', 'AND');
		$criteria->addCondition('idCategoria=:idCategoria', 'AND');
		$criteria->params = array(
			':id' => $id,
			':idCategoria' => $post->idCategoria,
		);
		$criteria->limit = 3;
		$criteria->order = "destaque = 1, id desc";
		$relacionadas = Post::model()->findAll($criteria);
		$this->render(
			'post',
			array(
				'post' => $post,
				'relacionadas' => $relacionadas
			)
		);
	}


	/**
	 * Comenta em uma publicação
	 */
	public function actionComentario()
	{
		$id = $_POST['idPost'];
		$model = new Comentario;
		if (isset($_POST['comentario'])) {
			$data = [
				'texto' => $_POST['comentario'],
				'idPost' => $id,
				'qtdCurtidas' => 0,
				'idUsuario' => Yii::app()->session->get('idUsuario'),
			];
			$model->setAttributes($data);
			if ($model->save())
				Yii::app()->user->setFlash('comentarioEnviado', 'Obrigado pela contribuição :)');
		}
		$this->redirect($this->createUrl('site/post', ['id' => $id]));
	}

	public function actionCurtir()
	{
		$comentario = Comentario::model()->findByPk($_POST['id']);
		$comentario->qtdCurtidas += 1;
		if ($comentario->save())
			die('success');
		die('error');
	}

	public function actionMeusDados()
	{

		$model = new Usuario();
		$usuario = $model->findByPk(Yii::app()->session->get('idUsuario'));
		if (!empty($_POST)) {
			$_POST['senha'] = $usuario->senha;
			$usuario->attributes = $_POST;
			if ($usuario->save()) {
				Yii::app()->user->setFlash('atualizacaoSucesso', 'Dados Atualizados com Sucesso!');
			} else {
				Yii::app()->user->setFlash('atualizacaoErro', 'Erro ao atualizar Dados');
			}
		}
		// display the cadastro form
		$this->render('meusDados', array(
			'model' => $model,
			'usuario' => $usuario,
		));
	}

	/**
	 * Displays the login page
	 */
	public function actionCadastro()
	{
		$model = new Usuario();
		if (!empty($_POST)) {
			$usuario = $model->findByAttributes([
				'email' => $_POST['email']
			]);
			if (is_null($usuario)) {
				$_POST['senha'] = md5($_POST['senha']);
				$model->attributes = $_POST;
				if ($model->save()) {
					Yii::app()->user->setFlash('usuarioCadasatrado', 'Faça Login para continuar');
					$this->redirect($this->createUrl('site/login'));
				}
			} else {
				Yii::app()->user->setFlash('usuarioExistente', 'Usuário já cadastrado no sistema');
			}
		}
		// display the cadastro form
		$this->render('cadastro', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
