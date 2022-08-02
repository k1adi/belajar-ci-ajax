<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model(array('user_model'));
	}

	public function index()
	{
        $this->load->view('index');
    }
    
    public function load_page(){
        $url = $this->uri->segment(1);
        $this->load->view($url);
    }

    public function data(){
        echo "data dari controller";
    }

    public function insert_user(){
        $get_name = $this->input->post('new_name');
        $get_age = $this->input->post('new_age');
        $get_gender = $this->input->post('new_gender');
        $get_religion = $this->input->post('new_religion');

        $data = $this->user_model->add_data($get_name, $get_age, $get_gender, $get_religion);
        echo json_encode($data);
        // echo $data;
    }

    public function get_user(){
        $data['get'] = $this->user_model->get_user(); 
        $this->load->view('tables', $data);
    }
}
