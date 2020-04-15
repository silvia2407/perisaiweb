<?php

class FaskesController extends Controller
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
				'actions'=>array('index','add','akun'),
                                'expression'=>function($user){
                                        return $_SESSION['role']==2;
                                },
			),
                        array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex(){
            
            $data_faskes=Faskes::model()->getFaskesArea($_SESSION['areaCode']);

		$data_view = array(
			"data_faskes" => $data_faskes,
			);

            $this->render('index',$data_view);
        }
        
        public function actionAdd(){
            
            if(isset($_POST['flag'])){
                if($_POST['tipe']=="" && $_POST['nama']=="" && $_POST['alamat']=="" && $_POST['telepon']=="" && $_POST['code']=="")
                {
                    Yii::app()->user->setFlash('success','Semua field harus diisi');
                }else{
                    $data_array =  array(
                        "faskesType" =>$_POST['tipe'],
                        "faskesName" =>$_POST['nama'],
                        "role" =>1,
                        "faskesAddress" =>$_POST['alamat'],
                        "areaCode" =>$_SESSION['areaCode'],
                        "faskesCode" =>$_POST['code'],
                        "latitude" =>0,
                        "longitude" =>0,
                        "faskesPhone"=>$_POST['telepon']
                    );

                    $data=http_build_query($data_array);
                    $add_faskes=Api::model()->callAPI("POST", "/faskes", $data);
                    
                    $add_faskes = json_decode($add_faskes, true);
                    
                    if($add_faskes['success']==TRUE){
                        Yii::app()->user->setFlash('sukses','Sukses menambahkan faskes');
                    }
                    else{
                        Yii::app()->user->setFlash('gagal','Gagal menambahkan faskes');
                    }    
                    
                }
            }
            $this->render("add");
        }
        
        public function actionAkun($id){
            $detail_faskes=Faskes::model()->getFaskes($id);
            
            if(isset($_POST['flag'])){
                if($_POST['username']=="" && $_POST['password']=="" && $_POST['email']=="")
                {
                    
                    Yii::app()->user->setFlash('success','Semua field harus diisi');
                    
                }else{
                    $data_array =  array(
                        "username" =>$_POST['username'],
                        "email" =>$_POST['email'],
                        "role" =>1,
                        "password" =>$_POST['password']
                    );

                    $data=http_build_query($data_array);
                    $register=Api::model()->callAPI("POST", "/user", $data);

                    $response = json_decode($register, true);
                    if($response['status']<=201){
                        if(isset($response['data']['userId'])){
                            $updateFaskes=Faskes::model()->updateFaskes($id,$response['data']['userId']);
                            
                            if($updateFaskes['code']==200)
                                $this->redirect(array("index"));
                        }else{
                            Yii::app()->user->setFlash('error','Semua2 field harus diisi');
                            $this->render("akun", array("faskesId"=>$id, "detail_faskes"=>$detail_faskes));
                        }
                    }
                } 
                Yii::app()->user->setFlash('success','Semua field harus diisi');
            }
            $this->render("akun", array("faskesId"=>$id, "detail_faskes"=>$detail_faskes));
            
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
