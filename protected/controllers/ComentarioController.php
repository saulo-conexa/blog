<?php

class ComentarioController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Comentario'),
		));
	}

	public function actionCreate() {
		$model = new Comentario;


		if (isset($_POST['Comentario'])) {
			$model->setAttributes($_POST['Comentario']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Comentario');


		if (isset($_POST['Comentario'])) {
			$model->setAttributes($_POST['Comentario']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Comentario')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Comentario');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Comentario('search');
		$model->unsetAttributes();

		if (isset($_GET['Comentario']))
			$model->setAttributes($_GET['Comentario']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}