<?php
class report_m extends CI_Model{
	public function getr(){
		
		$report=$this->db->select('*')->from('tblreport')->get()->result_array();
		$count=0;
		$data=[];
		//var_dump($report);
		for($i=0;$i<count($report);$i++){

			$username[$i]=$this->db->select('userName')->from('tbluser')->where('userId',$report[$i]['reportedId'])->get()->result_array();


			if($report[$i]['quesId'] != ""){
				$reporton="question";
			}	else if($report[$i]['ansId'] != ""){
				$reporton="answer";
			}else{

			$reporton="user";
		}

			if($report[$i]['status']==0){
				$view=false;
			}else{
				$view=true;
			}
			

		$data[$i]=[
			"index"=>$count,
			"reportId"=> $report[$i]['reportId'],
			"quesId"=> $report[$i]['quesId'],
			"ansId"=> $report[$i]['ansId'],
			"userId"=> $report[$i]['userId'],
			"reportedId"=> $report[$i]['reportedId'],
			"addedTime"=> $report[$i]['addedTime'],
			"reporton"=>   $reporton ,
			"success"=>$report[$i]['status'],
			"view"=>$view,
			"usernamebyreport"=>$username[$i][0]['userName']

		];
		$count=$count+1;
	}
	//var_dump($data);
	
		return $data;
		
	}

	public function ignore($reportid){
		$value=['status'=>1];
		$this->db->where('reportId',$reportid);
		$this->db->update('tblreport',$value);
	}	

	public function blocked($report){
		var_dump($report);
		$reportOn = $report['report']['reporton'];
		if($reportOn=="question"){
			$this->db->query("delete  from tblquestion where quesId='".$report['report']['quesId']."';");
		}else if($reportOn=="answer"){
			$this->db->query("delete  from tblanswer where ansId='".$report['report']['ansId']."';");
		}else{
			$this->db->query("delete  from tbluser where userId='".$report['report']['userId']."';");
		}

			}	


}
?>
