<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }
    }

    // DASHBOARD ADMIN
    public function admin()
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('dashboard/user');
        }

        $this->load->view('dashboard_admin');
    }

    // DASHBOARD USER
    public function user()
    {
        $this->load->view('dashboard_user');
    }
}
