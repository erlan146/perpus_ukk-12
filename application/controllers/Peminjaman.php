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
        $this->db->select('p.*, b.judul, b.penulis, b.tahun'); // 🔥 tambah tahun
        $this->db->from('peminjaman p');
        $this->db->join('buku b', 'b.id = p.id_buku', 'left');

        if ($this->session->userdata('role') != 'admin') {
            $this->db->where('p.nama_peminjam', $this->session->userdata('username'));
        }

        $data['peminjaman'] = $this->db->get()->result();

        $this->load->view('peminjaman/index', $data);
    }

    // ===============================
    // DETAIL
    // ===============================
    public function detail($id)
{
    $this->db->select('p.*, b.judul, b.penulis, b.tahun, u.kelas, u.jurusan');
    $this->db->from('peminjaman p');
    $this->db->join('buku b', 'b.id = p.id_buku', 'left');

    // 🔥 ganti sesuai nama tabel user lo
    $this->db->join('users u', 'u.username = p.nama_peminjam', 'left');

    $this->db->where('p.id', $id);

    $data['p'] = $this->db->get()->row();

    if (!$data['p']) {
        show_404();
    }

    $this->load->view('peminjaman/peminjaman_detail', $data);
}
    // ===============================
    // PINJAM
    // ===============================
    public function pinjam($id_buku)
    {
        $username = $this->session->userdata('username');

        $this->db->where('id_buku', $id_buku);
        $this->db->where('nama_peminjam', $username);
        $this->db->where('status', 'dipinjam');
        $cek = $this->db->get('peminjaman')->row();

        if ($cek) {
            echo "<script>alert('Kamu masih meminjam buku ini!'); window.location='".site_url('buku')."';</script>";
            return;
        }

        $buku = $this->db->get_where('buku', ['id'=>$id_buku])->row();

        if (!$buku || $buku->stok <= 0) {
            echo "<script>alert('Stok buku habis!'); window.location='".site_url('buku')."';</script>";
            return;
        }

        $this->db->insert('peminjaman', [
            'id_buku'        => $id_buku,
            'nama_peminjam'  => $username,
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali'=> date('Y-m-d', strtotime('+7 days')),
            'status'         => 'dipinjam',
            'denda'          => 0,
            'status_bayar'   => 'belum'
        ]);

        $this->db->set('stok', 'stok-1', FALSE);
        $this->db->where('id', $id_buku);
        $this->db->update('buku');

        if ($this->session->userdata('role') == 'admin') {
            redirect('dashboard/admin');
        } else {
            redirect('dashboard/user');
        }
    }

    // ===============================
    // KEMBALIKAN
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

        $this->db->where('id', $id);
        $this->db->update('peminjaman', [
            'status' => 'kembali',
            'denda'  => $denda
        ]);

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
        $this->db->select('p.*, b.judul, b.penulis, b.tahun'); // 🔥 tambah tahun
        $this->db->from('peminjaman p');
        $this->db->join('buku b','b.id = p.id_buku','left');
        $this->db->where('p.nama_peminjam', $this->session->userdata('username'));

        $data['trx'] = $this->db->get()->result();

        $this->load->view('transaksi_user', $data);
    }
}