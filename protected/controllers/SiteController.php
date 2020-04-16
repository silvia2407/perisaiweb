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
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
        
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
                        array('allow', // allow all user 
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('dashboard','logout'),
                                'expression'=>function($user){
                                        return $_SESSION['role']<=2;
                                },
			),
			array('deny',  // deny all users
				'users'=>array('*'),
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
		//$this->render('index');
                $this->redirect(array('login'));
	}
        
        public function actionDashboard()
	{
            if($_SESSION['role']==1){
                $data_tracking=Faskes::model()->getTrackingFaskes($_SESSION['faskesId']);
            }else{
                $data_tracking=Faskes::model()->getTrackingLocation($_SESSION['areaCode']);
                //$data_tracking="TIDAK ADA DATA";
            }
            

            $data_tracking = array(
                    "data_tracking" => $data_tracking,
                );
            $this->render('index',$data_tracking);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
                
                if(isset($_POST['username']) && isset($_POST['password'])){
                    
                    $model->username=$_POST['username'];
                    $model->password=$_POST['password'];
                    if($model->validate()){
                        
                        $data_array =  array(
                            "username" =>$_POST['username'],
                            "password"=> $_POST['password']
                        );
                        
                        $data=http_build_query($data_array);
                        
                        $result=$this->callAPI("POST", "https://twitterjobvacancy.online/api_perisai/public/user/login", $data);
                        
                        $response = json_decode($result, true);
                        if($response['status']==200){
                            
                            $_SESSION['token']=$response['data']['token'];
                            $_SESSION['role']=$response['data']['user']['role'];
                            $_SESSION['user_id']=$response['data']['user']['id'];
                            $_SESSION['status_login']=1;
                            if($_SESSION['role']==2){
                                $result=Api::model()->callAPI("GET", "/getDinkesUser/".$_SESSION['user_id'], false);

                                $response = json_decode($result, true);

                                if($response['code']==200){
                                    $_SESSION['name']="DINKES <br/>".$response['data'][0]['KotaName'];
                                    $_SESSION['dinkesId']=$response['data'][0]['dinkesId'];
                                    $_SESSION['areaCode']=$response['data'][0]['areaCode'];
                                    
                                    $total_person=Api::model()->callAPI("GET", "/getPersonStatusLocation/".$_SESSION['areaCode'], false);
                                    $total_person = json_decode($total_person, true);

                                    if($total_person['code']==200){
                                        $_SESSION['odp']=$total_person['data']['jumlah_odp'];
                                        $_SESSION['pdp']=$total_person['data']['jumlah_pdp'];
                                        $_SESSION['selesai']=$total_person['data']['jumlah_selesai'];
                                        $_SESSION['otg']=$total_person['data']['jumlah_otg'];
                                        $_SESSION['positif']=$total_person['data']['jumlah_positive'];
                                        $_SESSION['karantina']=$total_person['data']['jumlah_karantina'];
                                    }
                                }
                            }else if($_SESSION['role']==1){
                                $result=Api::model()->callAPI("GET", "/getFaskesUser/".$_SESSION['user_id'], false);

                                $response = json_decode($result, true);

                                if($response['code']==200){
                                    $_SESSION['name']=$response['data'][0]['faskesName'];
                                    $_SESSION['faskesId']=$response['data'][0]['faskesId'];
                                    $_SESSION['areaCode']=$response['data'][0]['areaCode'];

                                    $data_array =  array(
                                        "faskesId" =>$_SESSION['faskesId']
                                    );
                                    $total_person=Api::model()->callAPI("GET", "/getPersonStatusFaskes/".$_SESSION['faskesId'], false);
                                    $total_person = json_decode($total_person, true);

                                    if($total_person['code']==200){
                                        $_SESSION['odp']=$total_person['data']['jumlah_odp'];
                                        $_SESSION['pdp']=$total_person['data']['jumlah_pdp'];
                                        $_SESSION['selesai']=$total_person['data']['jumlah_selesai'];
                                        $_SESSION['otg']=$total_person['data']['jumlah_otg'];
                                        $_SESSION['positif']=$total_person['data']['jumlah_positive'];
                                        $_SESSION['karantina']=$total_person['data']['jumlah_karantina'];
                                    }
                                }
                            }
                            $this->redirect(array("dashboard"));
                        }else{
                            //echo "gagal";
                            //exit;
                            Yii::app()->user->setFlash('success','Data berhasil disimpan');
                        }
                    }
                        
                }
		$this->renderPartial('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		
                session_destroy();
                
		$this->redirect(Yii::app()->homeUrl);
	}
        
        function callAPI($method, $url, $data=false)
        {
            
            $curl = curl_init();

            switch ($method)
            {
                case "POST":
                    curl_setopt($curl, CURLOPT_POST, 1);

                    if ($data){
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    }
                    break;
                case "PUT":
                    curl_setopt($curl, CURLOPT_PUT, 1);
                    break;
                default:
                    if ($data)
                        $url = sprintf("%s?%s", $url, http_build_query($data));
            }

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
              //'jwt: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDAsImRhdGEiOnsiaWQiOiI5IiwiZmlyc3RuYW1lIjoiTWlrZSIsImxhc3RuYW1lIjoiRGFsaXNheSIsImVtYWlsIjoibWlrZUBjb2Rlb2ZhbmluamEuY29tIn19.h_Q4gJ3epcpwdwNCNCYxtiKdXsN34W9MEjxZ7sx21Vs',
              'Content-Type: application/x-www-form-urlencoded',
           ));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);

            curl_close($curl);

            return $result;
        }
}
?>