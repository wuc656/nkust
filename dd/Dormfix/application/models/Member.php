<?php
class Member extends CI_model {
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
    }
    function login($data) {
        if (!(isset($data['account']) || isset($data['passwd']))) {
            return FALSE;
        }
        $acco = html_escape(remove_invisible_characters($data['account']));
        $this->db->where('name', $acco);
        $this->db->where('password', $this->_saltpwd($data['passwd']));
        $master = $this->db->get('master')->row_array();
        if (!empty($master)) {
            $time_update = array(
                'last_login' => date("Y-m-d H:i:s"),
                'prev_login' => $master['last_login']//,
                //'password'=> $this->_saltpwd($data['passwd'])
            );
            $this->db->where('name', $acco);
            $this->db->update('master',$time_update);
            $this->session->set_userdata('name', $master['name']);
            $this->session->set_userdata('last_login', $time_update['last_login']);
            $this->session->set_userdata('prev_login', $time_update['prev_login']);
            return TRUE;
        }
        return FALSE;
    }
    function _saltpwd($pswd) {
        return hash('sha256', md5($pswd . $this->config->item('salt')));
    }
    function logout() {
        $this->session->sess_destroy();
    }
    function check_login() {
        return $this->session->has_userdata('name') ? TRUE : FALSE;
    }
    function chpwd($data) {
        if($this->check_login()){
            if (!(isset($data['old_pwd']) || isset($data['new_pwd']))) {
                return FALSE;
            }
            $this->db->where('name', $this->session->name);
            $this->db->where('password', $this->_saltpwd($data['old_pwd']));
            $master = $this->db->get('master')->row_array();
            if (!empty($master)) {
                $chpwd = array(
                    'password' => $this->_saltpwd($data['new_pwd']),
                    'last_login' => date("Y-m-d H:i:s"),
                    'prev_login' => $master['last_login']
                );
                $this->db->where('name', $this->session->name);
                $this->db->update('master',$chpwd);
                return TRUE;
            }
        }
        return FALSE;
    }
}