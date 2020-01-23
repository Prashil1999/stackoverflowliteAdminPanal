<?php
class count_m extends CI_Model{
	public function count(){
		//echo 'go';
		$user=$this->db->select('count(*)')->from('tbluser')->get()->result_array();
		$answer=$this->db->select('count(*)')->from('tblanswer')->get()->result_array();
		$question=$this->db->select('count(*)')->from('tblquestion')->get()->result_array();
		$report=$this->db->select('count(*)')->from('tblreport')->get()->result_array();
	
		$data=[
			"user"=> $user[0]['count(*)'],
			"question"=> $question[0]['count(*)'],
			"answer"=> $answer[0]['count(*)'],
			"report"=> $report[0]['count(*)']

		];

//var_dump($data);
		return $data;
		#array(1) { [0]=> [ ["count(*)"]=> string(1) "3" ]}
		#array(1) { [0]=> object(stdClass)#19 (1) { ["count(*)"]=> string(1) "3" } }
	}
}
?>


