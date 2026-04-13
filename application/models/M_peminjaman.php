<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peminjaman extends CI_Model {

    public function getAll()
    {
        return $this->db
            ->select('peminjaman.*, buku.judul AS judul_buku')
            ->from('peminjaman')
            ->join('buku', 'buku.id = peminjaman.id_buku')
            ->get()
            ->result();
    }
}