<?php

class Subscriber_m extends Lab_Model {

    protected $_table_name = 'subscribers';
    protected $_limit = '1';

    function __construct() {
        parent::__construct();
    }

    public function login($phone = NULL, $password = NULL) {
        $where = array();
        $where['phone']     = $phone;
        $where['password']   = md5($password.config_item('encryption_key'));
        
        $user = read('subscribers', $where);
        
        // set session data
        if($user) {
            $data = array(
                's_id'                      => $user[0]->id,
                's_name'                    => $user[0]->name,
                's_mobile'                  => $user[0]->phone,
                's_email'                   => $user[0]->email,
                's_path'                    => $user[0]->img_path,
                's_status'                  => $user[0]->status,
                's_login_period'              => date('Y-m-d H:i:s a'),
                'subscriberLoggedin'        => TRUE
            );
            //active session data
            $this->session->set_userdata($data);
            return true;
        }else{
            return false;
        }
        return false;
    }

    // update into database
    public function update($table, $data, $conditions) {
        $this->_table_name = $table;
        return $this->save($data, $conditions);
    }

    public function logout() 
    {
        $data = array(
            's_id'                      => null,
            's_name'                    => null,
            's_mobile'                  => null,
            's_logout_period'             => date('Y-m-d H:i:s a'),
            'subscriberLoggedin'        => FALSE
        );
        //active session data
        $this->session->set_userdata($data);
        // $this->session->sess_destroy();
    }

    public function loggedin() {
        return (bool) $this->session->userdata('subscriberLoggedin');
    }

}
