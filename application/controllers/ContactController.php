<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContactController extends CI_Controller {

    public function index() {
        $data['title'] = 'Hubungi Kami - Covid-19 Tracker';
        $this->load->view('contact', $data);
    }

}