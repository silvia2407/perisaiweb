<?php

/**
 * This is the model class for table "master_pis".
 *
 * The followings are the available columns in table 'master_pis':
 * @property integer $id_pis
 * @property string $nama
 * @property string $email
 * @property string $jabatan
 *
 * The followings are the available model relations:
 * @property PerihalEmail[] $perihalEmails
 */
class Api extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MasterPis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	

	public function callAPI($method, $url, $data=false)
	{
            $curl = curl_init();
            $baseUrl="https://twitterjobvacancy.online/api_perisai/public";
            //$url2=$url;
            $url=$baseUrl.$url;
            
            switch ($method)
            {
                case "POST":
                    curl_setopt($curl, CURLOPT_POST, 1);

                    if ($data){
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    }
                    break;
                case "PUT":
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                    if ($data){
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    }
                    break;
                default:
                    if ($data){
                        $url = sprintf("%s?%", $url, $data);
                    }
            }
            
            /*if($url2=="/getPersonStatusFaskes"){
                echo $url;
            exit;
            }*/
            
            
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
              'Authorization: Bearer '.$_SESSION['token'],
              'Content-Type: application/x-www-form-urlencoded',
           ));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);

            curl_close($curl);
            
//            $response = json_decode($result, true);
//            print_r($response);
//            exit;

            return $result;
	}
}