<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
class User_model extends CI_Model {

    public function add_data($name, $age, $gender, $religion){
        $data = array(
            'user_name' => $name,
            'user_age' => $age,
            'user_religion' => $religion,
            'user_gender' => $gender
        );
        // if($name != ''){
        //     $return['msg'] = '200'; 
        // } else {
        //     $return['msg'] = '500';
        // }
        if($this->db->insert('data_user', $data)){
            $return['msg'] = '200';
        } else {
            $return['msg'] = '500';
        }

        return $return;
    }

    public function get_user(){
        $this->db->from('data_user');
        $this->db->where('del', 0);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

}
?>