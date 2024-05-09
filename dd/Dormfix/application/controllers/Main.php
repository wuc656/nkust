<?php
class Main extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
        if (!$this->session->has_userdata('lang')) {
            $this->session->set_userdata('lang', 'zh-tw');
        }
    }
    private function index($params = array()) {
        $defaults = array(
            'page' => 'none',
            'data' => '',
            'components' => array()
        );
        $params = array_merge($defaults, $params);
        if (! file_exists(APPPATH.'views/pages/'.$params['page'].'.php')) {
            show_404();
            die();
        }
        $data['title'] = $this->config->item('title_front_end');
        $this->load->view('general/header', $data);
        $this->load->view('general/banner');
        $this->load->view('general/nagivation');
        $this->load->view('pages/' . $params['page'], $params['data']);

        foreach ($params['components'] as $key => $value) {
            if (! file_exists(APPPATH.'views/components/'.$key.'.php')) {
                show_404();
                die();
            }
            $this->load->view('components/' . $key, $value);
        }

        $this->load->view('general/footer');
    }

    public function request() {
        $this->lang->load('form_lang', $this->session->lang);
        $data = array('page' => 'request_form');
        $this->index($data);
    }

    public function request_sent() {
        $this->load->model('fixrequest');
        echo $this->fixrequest->sent($this->input->get(NULL, TRUE)) ? "success" : "fail";
        $this->load->view('pages/success');
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
        $data = array(  'page' => 'list',
                        'data' => array('columns' => $this->config->item($this->member->check_login() ? 'list_col_login' : 'list_col'),
                        'lists' => $this->fixrequest->get_list($pages, $listdata),
                        'pagination' => $this->fixrequest->get_page_link($pages),
                        'type' => $this->session->list,
                        'vendor' => $vendor
                    ));
        if($this->member->check_login())
            $data['components'] = array('detail_update' => '');
        $this->index($data);
    }

    public function request_print($pages = '1') {
        $this->lang->load('list_lang', $this->session->lang);
        $this->load->model('fixrequest');
        $this->load->model('member');
        if (!$this->session->has_userdata('list')) {
            $this->session->set_userdata('list', 'latest');
        }
        $listdata = array(
            'type' => $this->session->list,
            'vendor' => $this->session->vendor
        );
        $data = array(  'page' => 'table_print',
                        'data' => array('columns' => $this->config->item($this->member->check_login() ? 'list_col_login_print' : 'list_col'),
                        'lists' => $this->fixrequest->get_list($pages, $listdata),
                        'pagination' => $this->fixrequest->get_page_link($pages),
                        'type' => $this->session->list
                    ));
        $this->load->view('pages/table_print', $data['data']);
    }
    public function request_detail($uid = '0') {
        $this->lang->load('list_lang', $this->session->lang);
        $this->load->model('fixrequest');
        $this->load->model('member');
        //if uid not found than show it
        //show requests detail
        $data = array(  'page' => 'detail',
                        'data' => $this->fixrequest->detail($uid),
                        'components' => array('button_back' => '')
                    );
        empty($data['data']) ? show_404() : $this->index($data);
    }
    public function detail_update() {
        $this->load->model('fixrequest');
        $this->load->model('member');
        $raw = $this->input->post(NULL, TRUE);
        if (!empty($raw['vendor']))
            $raw['vendor'] = implode(",", $raw['vendor']);
        $request = html_escape(remove_invisible_characters($raw));
        if (!$this->fixrequest->update($request))
            die('error');
    }
    public function get_building_data($building_id = '0') {
        $this->load->model('building_data');
        echo $this->building_data->get($building_id);
    }
    public function manage($fcs = '') {
        $this->load->model('member');
        $this->lang->load('msg_lang', $this->session->lang);
        if ($this->member->check_login()) {
            $data = array(  'page'  =>  'manage',
                            'data'  =>  array('name' => $this->session->name,
                                            'last_login' => $this->session->last_login,
                                            'prev_login' => $this->session->prev_login
                                        )
                    );
        } else {
            $data = array('page' => 'login');
        }
        switch ($fcs) {
            case 'login':
				if($this->validate_captcha(html_escape(remove_invisible_characters($this->input->post('g-recaptcha-response'))))) {
                    if($this->member->login(html_escape(remove_invisible_characters($this->input->post(NULL, TRUE))))){
                        header("Location:" . base_url('index.php/manage'));
                    } else {
                        array_push($data, $data['components'] = array('msg_tag' => 
                            array(  'id' => 'pass_error',
                                    'color' => 'danger',
                                    'value' => $this->lang->line('pass_error'),
                                    'time' => '3000'//ms
                            )
                        ));
                    }
				} else {
                    array_push($data, $data['components'] = array('msg_tag' => 
                        array(  'id' => 'pass_error',
                                'color' => 'danger',
                                'value' => $this->lang->line('no_recaptcha'),
                                'time' => '3000'//ms
                        )
                    ));
				}
                break;
            case 'logout':
                $this->member->logout();
                header("Location:" . base_url('index.php/manage'));
                break;
            case 'chpwd':
                if ($this->member->chpwd(html_escape(remove_invisible_characters($this->input->post(NULL, TRUE))))) {
                    header("Location:" . base_url('index.php/manage'));
                } else {
                    array_push($data, $data['components'] = array('msg_tag' => 
                        array(  'id' => 'pass_error',
                                'color' => 'danger',
                                'value' => $this->lang->line('ch_pass_error'),
                                'time' => '3000'//ms
                        )
                    ));
                }
                break;
        }
        $this->index($data);
    }
	private function validate_captcha($captcha) {
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $this->config->item('secret') . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']));
		return ($response->success) ? TRUE : FALSE;
    }
    public function getsituation() {
        $this->load->model('fixrequest');
        echo $this->fixrequest->get_situation(html_escape(remove_invisible_characters($this->input->get(array('uid','secret'))), TRUE));
    }
    public function change_lang($langs = NULL) {
        if (!$this->session->has_userdata('lang') || is_null($langs)) {
            $this->session->set_userdata('lang', 'zh-tw');
        } else {
            $this->session->set_userdata('lang', $langs);
        }
    }
}