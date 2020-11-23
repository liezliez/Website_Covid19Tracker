<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Dg_model');
        $this->load->model('Dl_model');
    }

    public function index() {

        $data['locals'] = $this->Dl_model->getAll();
        $data['globals'] = $this->Dg_model->getAll();
        $data['title'] = 'Dashboard - Covid-19 Tracker';
        $data['pos'] = $this->Dl_model->getTotalPos();
        $data['neg'] = $this->Dl_model->getTotalNeg();
        $data['healed'] = $this->Dl_model->getTotalHealed();
        $data['died'] = $this->Dl_model->getTotalDied();

        $this->load->view('dashboard', $data);
    }

    public function getStatPos() {
        $x = $this->Dl_model->getStatPos();
        echo json_encode($x);
    }

}