<?php 


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function getcount()
	{
		$this->load->model('count_m');
		$data = $this->count_m->count();
		$res=json_encode($data);
		echo $res;
		// return $data;
	}

	public function getreports()
	{
		$this->load->model('report_m');
		$data = $this->report_m->getr();
		$res=json_encode($data);
		echo $res;
	}

	public function ingnorereport()
	{
		$report=json_decode(file_get_contents("php://input"),true);
		
		$this->load->model('report_m');
		 $this->report_m->ignore($report['reportId']);
	}

	public function blockeddata()
	{
		$report=json_decode(file_get_contents("php://input"),true);
		var_dump($report);
		$this->load->model('report_m');
		 $this->report_m->blocked($report);
	}


}
?>

