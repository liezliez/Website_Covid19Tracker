<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dl_model extends CI_Model {

    public function getAll() {
        return $this->db->get('data_lokal')->result();
    }

    public function insert($data) {
        $this->db->insert('data_lokal', $data);
        return $this->db->insert_id();
    }

    public function delete($id) {
        $this->db->where('dl_id', $id)->delete('data_lokal');
    }

    public function getOne($id) {
        return $this->db->get_where('data_lokal', array('dl_id' => $id))->row();
    }

    public function update($id, $data) {
        $this->db->where('dl_id', $id)->update('data_lokal', $data);
    }

    public function getTotalPos() {
        $q = $this->db->where('dl_stats', 'pos')->get('data_lokal');
        return $q->num_rows();
    }

    public function getTotalNeg() {
        $q = $this->db->where('dl_stats', 'neg')->get('data_lokal');
        return $q->num_rows();
    }

    public function getTotalHealed() {
        $q = $this->db->where('dl_stats', 'healed')->get('data_lokal');
        return $q->num_rows();
    }

    public function getTotalDied() {
        $q = $this->db->where('dl_stats', 'died')->get('data_lokal');
        return $q->num_rows();
    }

    public function getStatPos() {
        $q = $this->db
                ->select('count(dl_id) AS num, dl_date')->where('dl_stats', 'pos')
                ->group_by('dl_date')
                ->order_by('dl_date', 'asc')
                ->get('data_lokal', 10);
        return $q->result();
    }

}