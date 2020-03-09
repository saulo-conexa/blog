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
				'allow',  // allow all users to access 'index' and 'view' actions.
				'actions' => array('index', 'view'),
				'users' => array('*'),
			),
			array(
				'allow',  // allow all users to access 'index' and 'view' actions.
				'actions' => array('login', 'view'),
				'users' => array('*'),
			),
			array(
				'allow',  // allow all users to access 'index' and 'view' actions.
				'actions' => array('post', 'view'),
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
		$idCategoria = isset($_GET['categoria']) ? $_GET['categoria'] : false;
		$criteria = new CDbCriteria;
		if ($idCategoria) {
			$criteria->addCondition('idCategoria=:idCategoria', 'AND');
			$criteria->params = array(
				':idCategoria' => $idCategoria,
			);
		}

		// $pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
		// $qtdPerRequest = 2;
		// $criteria->order = "destaque DESC, id DESC";
		// $criteria->limit = $qtdPerRequest;
		// $criteria->offset = $pageno * $qtdPerRequest;

		$posts = Post::model()->findAll($criteria); // $params não é necessario

		// $countPosts = Post::model()->count();
		// $total_pages = ceil($countPosts / $qtdPerRequest);

		$criteriaCategoria = new CDbCriteria();
		$criteriaCategoria->order = 'ordem asc, id asc';
		$categorias = Categoria::model()->findAll($criteriaCategoria); // $params não é necessario

		$this->render('index', array(
			'posts' => $posts,
			// 'pageno' => $pageno,
			// 'total_pages' => $total_pages,
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
	 * Displays the contact page
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
	 * Displays the contact page
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


	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" .
					"Reply-To: {$model->email}\r\n" .
					"MIME-Version: 1.0\r\n" .
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

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
