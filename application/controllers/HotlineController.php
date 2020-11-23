<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HotlineController extends CI_Controller {

    public function index() {
        $this->load->model('Hl_model');

        $data['title'] = 'Hotline Corona - Covid-19 Tracker';
        $data['hots'] = $this->Hl_model->getAll();
        $this->load->view('hotline', $data);
    }

}