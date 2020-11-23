<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Msg_model extends CI_Model {

    public function getAll() {
        return $this->db->get('pesan')->result();
    }

    public function insert($data) {
        $this->db->insert('pesan', $data);
        return $this->db->insert_id();
    }

    public function delete($id) {
        $this->db->where('msg_id', $id)->delete('pesan');
    }

}