<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hl_model extends CI_Model {

    public function getAll() {
        return $this->db->get('hotlines')->result();
    }

    public function insert($data) {
        $this->db->insert('hotlines', $data);
        return $this->db->insert_id();
    }

    public function delete($id) {
        $this->db->where('hl_id', $id)->delete('hotlines');
    }

    public function getOne($id) {
        return $this->db->get_where('hotlines', array('hl_id' => $id))->row();
    }

    public function update($id, $data) {
        $this->db->where('hl_id', $id)->update('hotlines', $data);
    }

}