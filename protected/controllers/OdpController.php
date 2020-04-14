<?php

class OdpController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column3';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','detail','diagnosa','update','travel'),
                                'expression'=>function($user){
                                        return $_SESSION['role']<=1;
                                },
			),
                array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionIndex(){
		$data_odp=Odp::model()->getPersonByFaskesId($_SESSION['faskesId']);

		$data_view = array(
			"data_odp" => $data_odp,
			);

        $this->render('index',$data_view);
    }

    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionDetail($id)
	{
		$data_odp=Odp::model()->getPersonById($id);

		$data_view = array(
			"data_odp" => $data_odp,
			);

		$this->render('detail',$data_view);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionDiagnosa($id)
	{
		$diagnosa=Odp::model()->getDiagnoseById($id);
		$nama = Odp::model()->getNameById($id);

		$data_view = array(
			"diagnosa" => $diagnosa,
			"nama" => $nama,
			);

		$this->render('diagnosa',$data_view);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionTravel($id)
	{
		$travel=Odp::model()->getTravelById($id);
		$nama = Odp::model()->getNameById($id);

		$data_view = array(
			"travel" => $travel,
			"nama" => $nama,
			);

		$this->render('travel',$data_view);
	}
    
    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->render('create');
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sie']))
		{
			$model->attributes=$_POST['Sie'];
			if($model->save())
			{
                                Yii::app()->user->setFlash('success','Data berhasil disimpan');
				$this->redirect(array('admin'));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		// if(!isset($_GET['ajax']))
		// 	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		$this->redirect(array("index"));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sie('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sie']))
			$model->attributes=$_GET['Sie'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Sie::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sie-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
