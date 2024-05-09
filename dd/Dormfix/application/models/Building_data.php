<?php
class Building_data extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function get($building_id) {
        $school_list = new school_list;
        $school_arr = $this->config->item('building_data');
        $building_id = $building_id % count($school_arr);
        $school_arr = $school_arr[$building_id];
        $school_list->floors = $school_arr['floors'];
        $school_list->publicside = $school_arr['publicside'];
        $json = json_encode($school_list);
        return $json;
    }
}