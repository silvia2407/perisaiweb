<?php

class ProfilController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column1';

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
				'actions'=>array('index','view','password','test','update'),
                                'expression'=>function($user){
                                    if(isset($_SESSION['role']))
                                        return $_SESSION['role']<=2;
                                    else {
                                        return false;
                                    }
                                },
			),
                        array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex(){
            if($_SESSION['role']==2){
                $result=Api::model()->callAPI("GET", "/getDinkesUser/".$_SESSION['user_id'], false);

                $response = json_decode($result, true);
                
                if($response['code']==200){
                    $faskes=Api::model()->callAPI("GET", "/dinkes/".$_SESSION['dinkesId'], false);
                    $faskes = json_decode($faskes, true);
                    
                    if($faskes['code']==200){
                        $this->render('profilDinkes', array('model'=>$response['data'][0], 'faskes'=>$faskes["data"]));
                    }
                        
                }
            }else if($_SESSION['role']==1){
                $result=Api::model()->callAPI("GET", "/getFaskesUser/".$_SESSION['user_id'], false);

                $response = json_decode($result, true);
                
                if($response['code']==200){
                    $faskes=Api::model()->callAPI("GET", "/faskes/".$_SESSION['faskesId'], false);
                    $faskes = json_decode($faskes, true);
                    
                    if($faskes['code']==200){
                        $this->render('profilFaskes', array('model'=>$response['data'][0], 'faskes'=>$faskes["data"]));
                    }
                        
                }
                
            }
            
        }
        
        public function actionPassword(){
            $data_array =  array(
                "password"=> $_POST['password']
            );

            $data=http_build_query($data_array);
            
            $result=Api::model()->callAPI($_POST['type'], "/user/".$_SESSION['user_id'], $data);

            $response = json_decode($result, true);
            if($response['code']==200){
                session_destroy();
                echo json_encode("Password berhasil diupdate");
            }else{
                echo json_encode("Password gagal diupdate");
            }
        }
        
        
        public function actionTest(){
            $data_array =  array(
                "password"=> "gatot"
            );

            $data=http_build_query($data_array);
            
            $result=Api::model()->callAPI("PUT", "/user/".$_SESSION['user_id'], $data);

            $response = json_decode($result, true);
            if($response['code']==200){
                echo $_POST['password'];
            }else{
                echo print_r($response);
            }
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
		$model=new Sie;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sie']))
		{
			$model->attributes=$_POST['Sie'];
			if($model->save())
			{
                                Yii::app()->user->setFlash('success','Data berhasil disimpan');
				$this->redirect(array('create'));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
                if($_SESSION['role']==2){
                    $result=Api::model()->callAPI("GET", "/getDinkesUser/".$_SESSION['user_id'], false);

                    $response = json_decode($result, true);

                    if($response['code']==200){
                        $faskes=Api::model()->callAPI("GET", "/dinkes/".$_SESSION['dinkesId'], false);
                        $faskes = json_decode($faskes, true);

                        if($faskes['code']==200){
                            if(isset($_POST['flag'])){
                               if(isset($_POST['email'])){
                                    $data_array =  array(
                                        "email" =>$_POST['email']
                                    );

                                    $data=http_build_query($data_array);

                                    $result=Api::model()->callAPI("PUT", "/user/".$_SESSION['user_id'], $data);

                                } 
                                
                                if(isset($_POST['lokasi']) || isset($_POST['telepon'])){
                                   $data_array =  array(
                                        "dinkesPhone" =>$_POST['telepon'],
                                        "dinkesAddress"=> $_POST['lokasi']
                                    );

                                    $data=http_build_query($data_array);

                                    $result=Api::model()->callAPI("PUT", "/dinkes/".$_SESSION['dinkesId'], $data);
                                }
                                $this->redirect(array("index"));
                            }
                            $this->render('updateDinkes', array('model'=>$response['data'][0], 'faskes'=>$faskes["data"]));
                        }

                    }
                    
                }else{
                    $result=Api::model()->callAPI("GET", "/getFaskesUser/".$_SESSION['user_id'], false);

                    $response = json_decode($result, true);

                    if($response['code']==200){
                        $faskes=Api::model()->callAPI("GET", "/faskes/".$_SESSION['faskesId'], false);
                        $faskes = json_decode($faskes, true);

                        if($faskes['code']==200){
                            if(isset($_POST['flag'])){
                                if(isset($_POST['email'])){
                                    $email=$_POST['email'];
                                    
                                    $data_array =  array(
                                        "email" =>$email
                                    );

                                    $data=http_build_query($data_array);

                                    $result=Api::model()->callAPI("PUT", "/user/".$_SESSION['user_id'], $data);
                                }
                                
                                if(isset($_POST['lokasi']))
                                    $lokasi=$_POST['lokasi'];
                                else
                                    $lokasi=$faskes['faskesAddress'];
                                
                                if(isset($_POST['telepon']))
                                    $telepon=$_POST['telepon'];
                                else
                                    $telepon=$faskes['faskesPhone'];
                                
                                if(isset($lokasi) || isset($telepon)){
                                    $data_array =  array(
                                        "faskesPhone" =>$telepon,
                                        "faskesAddress"=> $lokasi
                                    );

                                    $data=http_build_query($data_array);

                                    $result=Api::model()->callAPI("PUT", "/faskes/".$_SESSION['faskesId'], $data);
                                }
                                $this->redirect(array("index"));
                            }
                            $this->render('updateFaskes', array('model'=>$response['data'][0], 'faskes'=>$faskes["data"]));
                        }

                    }
                }
                
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
