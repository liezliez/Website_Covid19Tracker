<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function find($u, $p) {
        return $this->db->where('admin_username', $u)->where('admin_password', $p)->get('admin')->row();
    }

}