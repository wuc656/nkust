<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    $config['title_front_end'] = "建工學生宿舍報修系統";
    $config['list_col'] = array('uid' => 'list_thead_uid',
                                'place' => 'list_thead_place',
                                'sender' => 'list_thead_sender',
                                'create_time' => 'list_thead_create_time',
                                'last_reply_time' => 'list_thead_last_reply_time',
                                'status' => 'list_thead_status'
                            );
    $config['list_col_login'] = array('uid' => 'list_thead_uid',
                                'place' => 'list_thead_place',
                                'sender' => 'list_thead_sender',
                                'situation' => 'list_thead_situation',
                                'create_time' => 'list_thead_create_time',
                                'last_reply_time' => 'list_thead_last_reply_time',
                                'status' => 'list_thead_status',
                                'remark' => 'list_thead_remark'
                            );
    $config['list_col_login_print'] = array('uid' => 'list_thead_uid',
                                'place' => 'list_thead_place',
                                'situation' => 'list_thead_situation',
                                'status' => 'list_thead_status',
                                'remark' => 'list_thead_remark'
                            );
    $config['per_page'] = 20;
    $config['str_deny'] = "沒有權限";
