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
class Faskes extends CActiveRecord
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

	
        //Faskes by area
	public function getFaskesArea($areaCode)
	{
            $result=Api::model()->callAPI("GET", "/getFaskesArea/".$areaCode, false);

            $response = json_decode($result, true);

            if(is_array($response)){
                    if($response['code']==200){
                        $data=$response['data'];
                    }
            }
            else{
                $data = "tidak ada data";
            }

                    return $data;
	}
        
        //Faskes by id
	public function getFaskes($id)
	{
            $result=Api::model()->callAPI("GET", "/faskes/".$id, false);

            $response = json_decode($result, true);

            if(is_array($response)){
                    if($response['code']==200){
                        $data=$response['data'];
                    }
            }
            else{
                $data = "tidak ada data";
            }

                    return $data;
	}
        
        //update
	public function updateFaskes($id, $userId)
	{
            $data_array =  array(
                "userId" =>$userId
            );

            $data=http_build_query($data_array);

            $result=Api::model()->callAPI("PUT", "/faskes/".$id, $data);

            $response = json_decode($result, true);

            return $response;
	}

        public function getTrackingFaskes($faskesId)
	{
            $result=Api::model()->callAPI("GET", "/getTrackingFaskes/".$faskesId, false);

            $response = json_decode($result, true);

            if(is_array($response)){
                    if($response['code']==200){
                        $data=$response['data'];
                    }
            }
            else{
                $data = "tidak ada data";
            }

                    return $data;
	}
        
        
        public function getTrackingLocation($locationId)
	{
            $result=Api::model()->callAPI("GET", "/getTrackingLocation/".$locationId, false);

            $response = json_decode($result, true);

            if(is_array($response)){
                    if($response['code']==200){
                        $data=$response['data'];
                    }
            }
            else{
                $data = "tidak ada data";
            }

            return $data;
	}
}
