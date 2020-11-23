<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dg_model extends CI_Model {

    public function getAll() {
        return $this->db->get('data_global')->result();
    }

    public function insert($data) {
        $this->db->insert('data_global', $data);
        return $this->db->insert_id();
    }

    public function delete($id) {
        $this->db->where('dg_id', $id)->delete('data_global');
    }

    public function getOne($id) {
        return $this->db->get_where('data_global', array('dg_id' => $id))->row();
    }

    public function update($id, $data) {
        $this->db->where('dg_id', $id)->update('data_global', $data);
    }

}