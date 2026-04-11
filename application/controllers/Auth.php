<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // TAMPILKAN HALAMAN LOGIN
    public function index()
    {
        $this->load->view('login');
    }

    // PROSES LOGIN
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', [
            'username' => $username,
            'password' => $password
        ])->row();

        if ($user) {

            // SIMPAN SESSION
            $this->session->set_userdata([
                'login'    => true,
                'username' => $user->username,
                'role'     => $user->role
            ]);

            // ARAHKAN BERDASARKAN ROLE
            if ($user->role == 'admin') {
                redirect('dashboard/admin');
            } else {
                redirect('dashboard/user');
            }

        } else {
            echo "Login gagal";
        }
    }

    // HALAMAN REGISTER
    public function register()
    {
        if ($this->input->post()) {

            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'kelas'    => $this->input->post('kelas'),
                'jurusan'  => $this->input->post('jurusan'),
                'role'     => 'user' // otomatis user
            ];

            $this->db->insert('users', $data);

            redirect('auth');
        }

        $this->load->view('register');
    }

    // LOGOUT
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
