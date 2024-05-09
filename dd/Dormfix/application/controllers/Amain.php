<?php
class Amain extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
        if (!$this->session->has_userdata('lang')) {
            $this->session->set_userdata('lang', 'zh-tw');
        }
    }

    public function request() {
        if (!file_exists(APPPATH.'views/pages/request_form.php')) {
            show_404();
            die();
        }
        $this->lang->load('form_lang', $this->session->lang);
        $this->load->view('pages/request_form');
    }

    public function request_list($pages = '1') {
        if (!$this->session->has_userdata('list') || is_null($this->session->list)) {
            $this->session->set_userdata('list', 'latest');
        }

        $pagetype = $this->input->get('pagetype', TRUE);
        $vendor = $this->input->get('vendor', TRUE);
        if (!is_null($pagetype) && $pagetype != "")
            $this->session->set_userdata('list', $pagetype);
        $this->lang->load('list_lang', $this->session->lang);
        $this->load->model('fixrequest');
        $this->load->model('member');
        $listdata = array(
            'type' => $this->session->list,
            'vendor' => $vendor
        );
        $data = array(  'columns' => $this->config->item($this->member->check_login() ? 'list_col_login' : 'list_col'),
                        'lists' => $this->fixrequest->get_list($pages, $listdata),
                        'pagination' => $this->fixrequest->get_page_link($pages),
                        'type' => $this->session->list,
                        'vendor' => $vendor
                    );
        $this->load->view('pages/list', $data);
        if($this->member->check_login())
            $this->load->view('components/detail_update');
    }

    public function request_detail($uid = '0') {
        if (!file_exists(APPPATH.'views/pages/detail.php') || !file_exists(APPPATH.'views/components/button_back.php')) {
            show_404();
            die();
        }
        $this->lang->load('list_lang', $this->session->lang);
        $this->load->model('fixrequest');
        $this->load->model('member');
        //if uid not found than show it
        //show requests detail
        $data = $this->fixrequest->detail($uid);
        empty($data) ? show_404() : $this->load->view('pages/detail', $data);
        $this->load->view('components/history_back');
    }

    public function manage() {
        if (!file_exists(APPPATH.'views/pages/manage.php') || !file_exists(APPPATH.'views/pages/login.php')) {
            show_404();
            die();
        }
        $this->load->model('member');
        $this->lang->load('msg_lang', $this->session->lang);
        if ($this->member->check_login()) {
            $data = array(  'name' => $this->session->name,
                            'last_login' => $this->session->last_login,
                            'prev_login' => $this->session->prev_login
                        );
            $this->load->view('pages/manage', $data);
        } else
            $this->load->view('pages/login');
    }

    public function get_contact() {
        $this->load->model('fixrequest');
        return $this->fixrequest->get_contact($this->input->get('uid',TRUE));
    }
}