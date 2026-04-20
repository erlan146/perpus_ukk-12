<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->database();
        $this->load->library('upload');
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
            $cover = 'default.jpg'; // default

            // 🔥 FIX UPLOAD
            if (isset($_FILES['cover']) && $_FILES['cover']['name'] != '') {

                $config['upload_path']   = FCPATH . 'assets/cover/'; // 🔥 WAJIB
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size']      = 2048;
                $config['file_name']     = time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload('cover')) {
                    $cover = $this->upload->data('file_name');
                }
            }

            $data = [
                'judul'   => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'tahun'   => $this->input->post('tahun'),
                'stok'    => $stok,
                'status'  => ($stok > 0) ? 'tersedia' : 'habis',
                'cover'   => $cover
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

        $buku = $this->db->get_where('buku', ['id' => $id])->row();

        if ($this->input->post()) {

            $stok = $this->input->post('stok');
            $cover = !empty($buku->cover) ? $buku->cover : 'default.jpg';

            if (isset($_FILES['cover']) && $_FILES['cover']['name'] != '') {

                $config['upload_path']   = FCPATH . 'assets/cover/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size']      = 2048;
                $config['file_name']     = time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload('cover')) {

                    // hapus lama
                    if ($cover != 'default.jpg' && file_exists(FCPATH.'assets/cover/'.$cover)) {
                        unlink(FCPATH.'assets/cover/'.$cover);
                    }

                    $cover = $this->upload->data('file_name');
                }
            }

            $data = [
                'judul'   => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'tahun'   => $this->input->post('tahun'),
                'stok'    => $stok,
                'status'  => ($stok > 0) ? 'tersedia' : 'habis',
                'cover'   => $cover
            ];

            $this->db->where('id', $id);
            $this->db->update('buku', $data);

            redirect('buku');
        }

        $data['buku'] = $buku;
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

        $buku = $this->db->get_where('buku', ['id' => $id])->row();

        if ($buku && $buku->cover != 'default.jpg') {
            @unlink(FCPATH.'assets/cover/'.$buku->cover);
        }

        $this->db->delete('buku', ['id' => $id]);
        redirect('buku');
    }
}