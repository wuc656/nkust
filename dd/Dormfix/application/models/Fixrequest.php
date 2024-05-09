<?php
class Fixrequest extends CI_Model {
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
    }
    function sent($request_data = array()) {
        $allowed  = ['place', 'situation', 'sender', 'secret', 'contact'];
        foreach ($allowed as $key) {
            if (empty($request_data[$key]) && !(($key == 'secret') || ($key == 'contact')))
                die('die');
            else
                $request_data[$key] = html_escape(remove_invisible_characters($request_data[$key]));
        }
        $request_data['place'] = implode(' ', $request_data['place']);
        $request_data['sender'] = implode(' ', $request_data['sender']);
        $request_data['create_time'] = date("Y-m-d");
		$contact = $request_data['contact'];
		unset($request_data['contact']);
        $this->db->insert('fix_detail', $request_data);
        $contact = array(
            'uid' => $this->db->insert_id('fix_detail'),
            'contact' => $contact
        );
        $this->db->insert('contact', $contact);
        return TRUE;
    }
    function get_list($page, $data) {
        $this->db->order_by('uid', "desc");
        if(is_numeric($data['type']))
            $this->db->where('status =', $data['type']);
        else
            $this->db->where('status !=', '1');
        if(!empty($data['vendor'])) {
            $this->db->like('vendor', html_escape(remove_invisible_characters($data['vendor'])));
            $this->session->set_userdata('vendor', $data['vendor']);
        }
        return $this->db->get('fix_detail', $this->config->item('per_page'), (intval($page) - 1) * $this->config->item('per_page'))->result_array();
    }

    function get_contact($uid) {
        $this->load->model('member');
        if (!$this->member->check_login()) {
            http_response_code(403);
            die('Plase login.');
        }
        $this->db->where('uid', html_escape(remove_invisible_characters($uid)));
        $this->db->select('contact');
		$data = $this->db->get('contact')->row();
        echo is_null($data) ? 'none' : $data->contact;
    }

    function get_page_link($page) {
        $this->load->library('pagination');
        $config['full_tag_open'] = '';
        $config['full_tag_close'] = '';
        $config['first_link'] = '<<';              //末頁
        $config['last_link'] = '>>';              //末頁
        $config['prev_link'] = '<';              //前頁
        $config['next_link'] = '>';              //下頁
        $config['cur_tag_open'] = '<a class="btn btn-success btn-square disabled active">';        //當前頁
        $config['cur_tag_close'] = '</a>';
        $config['use_page_numbers'] = TRUE;
        $config['base_url'] = site_url('request_list_rows/');
		if($this->session->list == 'latest'){
			$this->db->where('status !=', '1');
		} else {
			$this->db->where('status =', $this->session->list);
		}
        $config['total_rows'] = $this->db->count_all_results('fix_detail');
        $config['per_page'] = $this->config->item('per_page');
        $config['attributes'] = array('class' => 'btn btn-success  btn-square', 'onclick' => 'return refresh_rows($(this));');
        $this->pagination->initialize($config);
        $result = $this->pagination->create_links();
        return empty($result) ? '<a class="btn btn-success btn-square active disabled">1</a>' : $result;
    }
    function detail($uid) {
        $query = $this->db->get_where('fix_detail', array('uid' => $uid));
        if ($query->num_rows() > 0) {
            $response = $query->row_array();
            if (!empty($response['secret']))
                $response['situation'] = $this->load->view('components/secret', '', TRUE);
        } else {
            $response = false;
        }
        return $response;
    }
    function update($request) {
        $this->load->model('member');
        if (!$this->member->check_login())
            die('Plase login.');
        $time_tag = "－" . date("Y-m-d H:i:s") . "\n";
        $remark = empty($request['remark']) ? NULL : $request['remark'] . $time_tag;
        $this->db->where('uid', $request['uid']);
        $this->db->set('status', $request['status']);
        $this->db->set('last_reply_time', date("Y-m-d"));
        $this->db->set('remark', 'CONCAT(remark,\'' . $remark . '\')', FALSE);
        $this->db->set('vendor', $request['vendor']);
        $this->db->update('fix_detail');
        return TRUE;
    }
    function get_situation($data) {
        $uid = html_escape(remove_invisible_characters($data['uid']));
        $secret = html_escape(remove_invisible_characters($data['secret']));
        $this->db->where('uid', $uid);
        $this->db->where('secret', $secret);
        $this->db->select('situation');
        $situation = $this->db->get('fix_detail')->row()->situation;
        if (!empty($situation)) {
            echo $situation;
        } else {
            http_response_code(403);
        }
    }
}
