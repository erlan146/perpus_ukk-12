<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }
    }

    // ===============================
    // LIST DATA
    // ===============================
    public function index()
    {
        $this->db->select('p.*, b.judul');
        $this->db->from('peminjaman p');
        $this->db->join('buku b', 'b.id = p.id_buku');

        if ($this->session->userdata('role') != 'admin') {
            $this->db->where('p.nama_peminjam', $this->session->userdata('username'));
        }

        $data['peminjaman'] = $this->db->get()->result();

        $this->load->view('peminjaman/index', $data);
    }

    // ===============================
    // PINJAM
    // ===============================
    public function pinjam($id_buku)
    {
        $buku = $this->db->get_where('buku', ['id'=>$id_buku])->row();

        if (!$buku || $buku->stok <= 0) {
            echo "Buku tidak tersedia!";
            return;
        }

        $data = [
            'id_buku'        => $id_buku,
            'nama_peminjam'  => $this->session->userdata('username'),
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali'=> date('Y-m-d', strtotime('+7 days')),
            'status'         => 'dipinjam',
            'denda'          => 0,
            'status_bayar'   => 'belum'
        ];

        $this->db->insert('peminjaman', $data);

        // kurangi stok
        $this->db->set('stok', 'stok-1', FALSE);
        $this->db->where('id', $id_buku);
        $this->db->update('buku');

        redirect('dashboard/user');
    }

    // ===============================
    // KEMBALIKAN BUKU
    // ===============================
    public function kembali($id, $id_buku)
    {
        $p = $this->db->get_where('peminjaman', ['id'=>$id])->row();

        if (!$p) {
            redirect('peminjaman');
        }

        $hari_ini = date('Y-m-d');
        $denda = 0;

        if ($hari_ini > $p->tanggal_kembali) {
            $tgl1 = new DateTime($p->tanggal_kembali);
            $tgl2 = new DateTime($hari_ini);
            $selisih = $tgl1->diff($tgl2)->days;
            $denda = $selisih * 1000;
        }

        // update peminjaman
        $this->db->where('id', $id);
        $this->db->update('peminjaman', [
            'status' => 'kembali',
            'denda'  => $denda
        ]);

        // tambah stok kembali
        $this->db->set('stok', 'stok+1', FALSE);
        $this->db->where('id', $id_buku);
        $this->db->update('buku');

        redirect('peminjaman');
    }

    // ===============================
    // HAPUS
    // ===============================
    public function hapus($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('peminjaman');
        }

        $p = $this->db->get_where('peminjaman', ['id'=>$id])->row();

        if ($p && $p->status == 'kembali') {
            $this->db->delete('peminjaman', ['id'=>$id]);
        }

        redirect('peminjaman');
    }

    // ===============================
    // TRANSAKSI USER
    // ===============================
    public function transaksi_user()
    {
        $this->db->select('p.*, b.judul');
        $this->db->from('peminjaman p');
        $this->db->join('buku b','b.id = p.id_buku');
        $this->db->where('p.nama_peminjam', $this->session->userdata('username'));

        $data['trx'] = $this->db->get()->result();

        $this->load->view('transaksi_user', $data);
    }
}