<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }
    }

    // ==========================
    // LIST DATA
    // ==========================
    public function index()
    {
        $data['buku'] = $this->db->get('buku')->result();
        $this->load->view('buku/index', $data);
    }

    // ==========================
    // TAMBAH
    // ==========================
    public function tambah()
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('buku');
        }

        if ($this->input->post()) {

            $stok = $this->input->post('stok');

            $data = [
                'judul'   => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'), // ✅ FIX
                'tahun'   => $this->input->post('tahun'),   // ✅ TAMBAH
                'stok'    => $stok,
                'status'  => ($stok > 0) ? 'tersedia' : 'habis'
            ];

            $this->db->insert('buku', $data);
            redirect('buku');
        }

        $this->load->view('buku/tambah');
    }

    // ==========================
    // EDIT
    // ==========================
    public function edit($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('buku');
        }

        if ($this->input->post()) {

            $stok = $this->input->post('stok');

            $data = [
                'judul'   => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'), // ✅ TAMBAH
                'tahun'   => $this->input->post('tahun'),   // ✅ TAMBAH
                'stok'    => $stok,
                'status'  => ($stok > 0) ? 'tersedia' : 'habis'
            ];

            $this->db->where('id', $id);
            $this->db->update('buku', $data);

            redirect('buku');
        }

        $data['buku'] = $this->db->get_where('buku', ['id' => $id])->row();
        $this->load->view('buku/edit', $data);
    }

    // ==========================
    // HAPUS
    // ==========================
    public function hapus($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('buku');
        }

        $this->db->delete('buku', ['id' => $id]);
        redirect('buku');
    }
}