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
class Odp extends CActiveRecord
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

	
    //Fungsi Filter List ODP by Faskes ID
	public function getPersonByFaskesId($faskesId)
	{
        $result=Api::model()->callAPI("GET", "/getListPersonFaskes/".$faskesId, false);

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

	//Fungsi Get ODP Detail By Person ID
	public function getPersonById($personId)
	{
        $result=Api::model()->callAPI("GET", "/person/".$personId, false);

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

	//Fungsi Get Diagnose By Person ID
	public function getDiagnoseById($personId)
	{
        $result=Api::model()->callAPI("GET", "/getDiagnosaPerson/".$personId, false);

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

	//Fungsi Get Travel By Person ID
	public function getTravelById($personId)
	{
        $result=Api::model()->callAPI("GET", "/getPersonTravel/".$personId, false);

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

	//Fungsi Get Nama By Person ID
	public function getNameById($personId)
	{
        $result=Api::model()->callAPI("GET", "/person/".$personId, false);

        $response = json_decode($result, true);
        
        if(is_array($response)){
        	if($response['code']==200){
	            $data=$response['data']['nama'];
	        }
        }
    	else{
            $data = "tidak ada data";
        }
    
		return $data;
	}

	//Fungsi Get Nama By Person ID
	public function getStatusById($statusId)
	{
        $result=Api::model()->callAPI("GET", "/status/".$statusId, false);

        $response = json_decode($result, true);
        
        if(is_array($response)){
        	if($response['code']==200){
	            $statusDesc=$response['data']['statusDesc'];

	            switch ($statusId)
		        {
		            case "1":
		                $data = "<span class=\"badge bg-warning\">".$statusDesc."</span>";
		                break;
		            case "2":
		                $data = "<span class=\"badge bg-warning\">".$statusDesc."</span>";
		                break;
		            case "3":
		                $data = "<span class=\"badge bg-danger\">".$statusDesc."</span>";
		                break;
		            case "4":
		                $data = "<span class=\"badge bg-danger\">".$statusDesc."</span>";
		                break;
		            case "5":
		                $data = "<span class=\"badge bg-success\">".$statusDesc."</span>";
		                break;
		            case "6":
		                $data = "<span class=\"badge bg-danger\">".$statusDesc."</span>";
		                break;
		            default:
		                $data = $statusDesc;
		        }
			}
        }
    	else{
            $data = "tidak ada data";
        }
    
		return $data;
	}
}
