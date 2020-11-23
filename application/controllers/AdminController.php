<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Dl_model');
        $this->load->model('Dg_model');
        $this->load->model('Hl_model');
        $this->load->model('Msg_model');
        $this->load->helper(array('form', 'file'));
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index() {
        if (!$this->session->has_userdata('logged_in')) {
            redirect(base_url('admin/login'));
        }

        $data['title'] = 'Data Indonesia - Covid-19 Tracker';
        $data['covs'] = $this->Dl_model->getAll();
        $this->load->view('admin/index', $data);
    }

    public function global() {
        if (!$this->session->has_userdata('logged_in')) {
            redirect(base_url('admin/login'));
        }

        $data['title'] = 'Data by Country - Covid-19 Tracker';
        $data['covs'] = $this->Dg_model->getAll();
        $this->load->view('admin/global', $data);
    }

    public function hotlines() {
        if (!$this->session->has_userdata('logged_in')) {
            redirect(base_url('admin/login'));
        }

        $data['title'] = 'Hotlines - Covid-19 Tracker';
        $data['hots'] = $this->Hl_model->getAll();
        $this->load->view('admin/hotlines', $data);
    }

    public function message() {
        if (!$this->session->has_userdata('logged_in')) {
            redirect(base_url('admin/login'));
        }

        $data['title'] = 'Pesan - Covid-19 Tracker';
        $data['msgs'] = $this->Msg_model->getAll();
        $this->load->view('admin/message', $data);
    }

    public function login() {
        if ($this->session->has_userdata('logged_in')) {
            redirect(base_url('admin'));
        }

        $data['title'] = 'Admin Login - Covid-19 Tracker';
        $this->load->view('admin/login', $data);
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('admin/login');
    }

    public function dl_add() {
        $POST = $this->input->post();
        foreach ($POST['age'] as $v) {
            if ($v == '') {
                echo json_encode(array('stats' => 0, 'msg' => 'Setiap kolom umur dan tanggal harus diisi'));
                return false;
            }
        }
        foreach ($POST['date'] as $v) {
            if ($v == '') {
                echo json_encode(array('stats' => 0, 'msg' => 'Setiap kolom umur dan tanggal harus diisi'));
                return false;
            }
        }
        $data = array();
        for ($i=0; $i < count($POST['age']); $i++) { 
            $data[$i]['dl_age'] = $POST['age'][$i];
            $data[$i]['dl_gender'] = ($POST['gender'][$i] != 'Pilih Jenis Kelamin') ? $POST['gender'][$i] : '-';
            $data[$i]['dl_stats'] = ($POST['stats'][$i] != 'Pilih Status') ? $POST['stats'][$i] : '-';
            $data[$i]['dl_states'] = ($POST['states'][$i] != 'Pilih Provinsi') ? $POST['states'][$i] : '-';
            $data[$i]['dl_hospital'] = $POST['hospital'][$i] ?: '-';
            $data[$i]['dl_date'] = $POST['date'][$i];
            $insert_id = $this->Dl_model->insert($data[$i]);
        }
        echo json_encode(array('stats' => 1, 'msg' => 'Data berhasil ditambah'));
    }

    public function msg_add() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama', 'required',
            array('required' => 'Kolom nama harus diisi.')
        );
        $this->form_validation->set_rules('email', 'Email', 'required',
            array('required' => 'Kolom email harus diisi.')
        );
        $this->form_validation->set_rules('msg', 'Pesan', 'required',
            array('required' => 'Kolom pesan harus diisi.')
        );
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('stats' => 0, 'msg' => validation_errors()));
            return false;
        }
        else {
            $data = array(
                'msg_name'          => $this->input->post('name', true),
                'msg_email'         => $this->input->post('email', true),
                'msg_text'          => $this->input->post('msg', true)

            );
            $insert_id = $this->Msg_model->insert($data);
            echo json_encode(array('stats' => 1, 'msg' => 'Pesan berhasil dikirim'));
        }
    }

    public function hl_add() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('number', 'Nomor', 'required',
            array('required' => 'Kolom nomor harus diisi.')
        );
        $this->form_validation->set_rules('name', 'Nama', 'required',
            array('required' => 'Kolom nama harus diisi.')
        );
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('stats' => 0, 'msg' => validation_errors()));
            return false;
        }
        else {
            $data = array(
                'hl_number'         => $this->input->post('number', true),
                'hl_name'           => $this->input->post('name', true)
            );
            if (!empty($_FILES['img']['name'])) {
                $newname = $this->generateRandomString();
                
                $config['file_name'] = $newname;
                $config['upload_path'] = './assets/images/hotlines/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2024';
                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('img')) {
                    echo json_encode(array('stats' => 0, 'msg' => $this->upload->display_errors()));
                    return false;
                }
                else {
                    $data['hl_img'] = $newname . $this->upload->data('file_ext');
                    // $x = array('upload_data' => $this->upload->data());
                }
            }
            $insert_id = $this->Hl_model->insert($data);
            echo json_encode(array('stats' => 1, 'msg' => 'Data berhasil ditambah'));
        }
    }

    public function hl_edit() {
        // print_r(FCPATH);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('number', 'Nomor', 'required',
            array('required' => 'Kolom nomor harus diisi.')
        );
        $this->form_validation->set_rules('name', 'Nama', 'required',
            array('required' => 'Kolom nama harus diisi.')
        );
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('stats' => 0, 'msg' => validation_errors()));
            return false;
        }
        else {
            $data = array(
                'hl_number'         => $this->input->post('number', true),
                'hl_name'           => $this->input->post('name', true)
            );
            if (!empty($_FILES['img2']['name'])) {
                $newname = $this->generateRandomString();
                
                $config['file_name'] = $newname;
                $config['upload_path'] = './assets/images/hotlines/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2024';
                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('img2')) {
                    echo json_encode(array('stats' => 0, 'msg' => $this->upload->display_errors()));
                    return false;
                }
                else {
                    $current = $this->Hl_model->getOne($this->input->post('id'));
                    unlink(FCPATH . 'assets/images/hotlines/' . $current->hl_img);
                    $data['hl_img'] = $newname . $this->upload->data('file_ext');
                    // // $x = array('upload_data' => $this->upload->data());
                }
            }
            $insert_id = $this->Hl_model->update($this->input->post('id'), $data);
            echo json_encode(array('stats' => 1, 'msg' => 'Data berhasil diubah'));
        }
    }

    public function dg_add() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'Negarta', 'required',
            array('required' => 'Kolom negara harus diisi.')
        );
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('stats' => 0, 'msg' => validation_errors()));
            return false;
        }
        else {
            $data = array(
                'dg_country'        => $this->input->post('country', true),
                'dg_pos'            => $this->input->post('pos', true) ?: 0,
                'dg_healed'         => $this->input->post('healed', true) ?: 0,
                'dg_died'           => $this->input->post('died', true) ?: 0
            );
            $insert_id = $this->Dg_model->insert($data);
            echo json_encode(array('stats' => 1, 'msg' => 'Data berhasil ditambah'));
        }
    }

    public function findLokal($id) {
        $x = $this->Dl_model->getOne($id);
        echo json_encode($x);
    }

    public function findGlobal($id) {
        $x = $this->Dg_model->getOne($id);
        echo json_encode($x);
    }

    public function findHotline($id) {
        $x = $this->Hl_model->getOne($id);
        echo json_encode($x);
    }

    public function dl_edit() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('age', 'Age', 'required',
            array('required' => 'Kolom usia harus diisi.')
        );
        $this->form_validation->set_rules('date', 'Date', 'required',
            array('required' => 'Kolom tanggal harus diisi.')
        );
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('stats' => 0, 'msg' => validation_errors()));
            return false;
        } else {
            $data = array(
                'dl_age'        => $this->input->post('age', true),
                'dl_gender'     => $this->input->post('gender', true) ?: '-',
                'dl_stats'      => $this->input->post('stats', true) ?: '-',
                'dl_states'     => ($this->input->post('states', true) != 'Pilih Provinsi') ? $this->input->post('states', true) : '-',
                'dl_hospital'   => $this->input->post('hospital', true) ?: '-',
                'dl_date'       => date("Y-m-d", strtotime($this->input->post('date')))
            );
            $this->Dl_model->update($this->input->post('id'), $data);
            echo json_encode(array('stats' => 1, 'msg' => 'Data berhasil diubah'));
        }
    }

    public function dg_edit() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'Country', 'required',
            array('required' => 'Kolom negara harus diisi.')
        );
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('stats' => 0, 'msg' => validation_errors()));
            return false;
        } else {
            $data = array(
                'dg_country'        => $this->input->post('country', true),
                'dg_pos'            => $this->input->post('pos', true) ?: 0,
                'dg_healed'            => $this->input->post('healed', true) ?: 0,
                'dg_died'           => $this->input->post('died', true) ?: 0
            );
            $this->Dg_model->update($this->input->post('id'), $data);
            echo json_encode(array('stats' => 1, 'msg' => 'Data berhasil diubah'));
        }
    }

    public function dl_delete() {
        $id = $this->input->post('id', true);
        $this->Dl_model->delete($id);
    }

    public function dg_delete() {
        $id = $this->input->post('id', true);
        $this->Dg_model->delete($id);
    }

    public function hl_delete() {
        $id = $this->input->post('id', true);
        $current = $this->Hl_model->getOne($id);
        $this->Hl_model->delete($id);
        unlink(FCPATH . 'assets/images/hotlines/' . $current->hl_img);
    }

    public function msg_delete() {
        $id = $this->input->post('id', true);
        $this->Msg_model->delete($id);
    }

    public function do_login() {
        $this->load->model('Login_model');
        $x = $this->Login_model->find($this->input->post('username'), $this->input->post('password'));
        if ($x) {
            $this->session->set_userdata('logged_in', 1);
            echo json_encode(array('stats' => 1, 'msg' => 'Login berhasil'));
        } else {
            echo json_encode(array('stats' => 0, 'msg' => 'Username atau Password salah'));
            return false;
        }
    }

}