<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        if ($this->session->userdata('role') != 'admin') {
            redirect('dashboard/user');
        }
    }

    // ================== LIST
    public function index()
    {
        $data['anggota'] = $this->db->get('users')->result();
        $this->load->view('anggota/index', $data);
    }

    // ================== TAMBAH
    public function tambah()
    {
        if ($this->input->post()) {

            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'kelas' => $this->input->post('kelas'),
                'jurusan' => $this->input->post('jurusan'),
                'role' => 'user',
                'status' => 'aktif'
            ];

            $this->db->insert('users', $data);
            redirect('anggota');
        }

        $this->load->view('anggota/tambah');
    }

    // ================== EDIT
    public function edit($id)
    {
        $data['a'] = $this->db->get_where('users',['id'=>$id])->row();

        if ($this->input->post()) {

            $update = [
                'username' => $this->input->post('username'),
                'kelas' => $this->input->post('kelas'),
                'jurusan' => $this->input->post('jurusan'),
            ];

            if ($this->input->post('password')) {
                $update['password'] = $this->input->post('password');
            }

            $this->db->where('id',$id);
            $this->db->update('users',$update);

            redirect('anggota');
        }

        $this->load->view('anggota/edit',$data);
    }

    // ================== HAPUS
    public function hapus($id)
    {
        $this->db->delete('users',['id'=>$id]);
        redirect('anggota');
    }

    // ================== BLACKLIST
    public function blacklist($id)
    {
        $this->db->update('users',['status'=>'blacklist'],['id'=>$id]);
        redirect('anggota');
    }

    public function aktif($id)
    {
        $this->db->update('users',['status'=>'aktif'],['id'=>$id]);
        redirect('anggota');
    }
}