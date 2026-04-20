<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    // ================= HALAMAN LOGIN =================
    public function index()
    {
        $this->load->view('login');
    }

    // ================= LOGIN PROCESS =================
    public function login()
    {
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));

        $user = $this->db->get_where('users', [
            'username' => $username
        ])->row();

        if ($user) {

            // PASSWORD HASH CHECK
            if (password_verify($password, $user->password)) {

                $this->session->set_userdata([
                    'username' => $user->username,
                    'role'     => $user->role,
                    'login'    => true
                ]);

                if ($user->role == 'admin') {
                    redirect('dashboard/admin');
                } else {
                    redirect('dashboard/user');
                }

            } else {
                echo "<script>alert('Password salah');history.back();</script>";
            }

        } else {
            echo "<script>alert('User tidak ditemukan');history.back();</script>";
        }
    }

    // ================= REGISTER PAGE =================
    public function register()
    {
        $this->load->view('register');
    }

    // ================= REGISTER PROCESS =================
    public function proses_register()
    {
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));
        $kelas    = $this->input->post('kelas');
        $jurusan  = $this->input->post('jurusan');

        // CEK USER
        $cek = $this->db->get_where('users', [
            'username' => $username
        ])->row();

        if ($cek) {
            echo "<script>alert('Username sudah digunakan');history.back();</script>";
            return;
        }

        $hash = password_hash($hashed   , PASSWORD_DEFAULT);

        $data = [
            'username' => $username,
            'password' => $hash,
            'role'     => 'user',
            'kelas'    => $kelas,
            'jurusan'  => $jurusan,
            'status'   => 'aktif'
        ];

        $this->db->insert('users', $data);

        echo "<script>alert('Register berhasil, silakan login');window.location='".site_url('auth')."';</script>";
    }

    // ================= LOGOUT =================
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}