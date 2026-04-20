<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Laporan extends CI_Controller {

    // ================== VIEW WEB ==================
    public function peminjaman()
    {
        $tanggal = $this->input->get('tanggal');
        $bulan   = $this->input->get('bulan');
        $tahun   = $this->input->get('tahun');

        $this->db->select('peminjaman.*, buku.judul as judul_buku');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.id = peminjaman.id_buku', 'left');

        if (!empty($tanggal)) {
            $this->db->where('DATE(tanggal_pinjam)', $tanggal);
        }
        if (!empty($bulan)) {
            $this->db->where('MONTH(tanggal_pinjam)', $bulan);
        }
        if (!empty($tahun)) {
            $this->db->where('YEAR(tanggal_pinjam)', $tahun);
        }

        $data['peminjaman'] = $this->db->get()->result();

        $data['filter'] = [
            'tanggal' => $tanggal,
            'bulan'   => $bulan,
            'tahun'   => $tahun
        ];

        $this->load->view('laporan_peminjaman', $data);
    }

    // ================== PDF EXPORT ==================
    public function pdf_peminjaman()
    {
        require_once APPPATH.'third_party/dompdf/autoload.inc.php';

        $tanggal = $this->input->get('tanggal');
        $bulan   = $this->input->get('bulan');
        $tahun   = $this->input->get('tahun');

        $this->db->select('peminjaman.*, buku.judul as judul_buku');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.id = peminjaman.id_buku', 'left');

        if (!empty($tanggal)) {
            $this->db->where('DATE(tanggal_pinjam)', $tanggal);
        }
        if (!empty($bulan)) {
            $this->db->where('MONTH(tanggal_pinjam)', $bulan);
        }
        if (!empty($tahun)) {
            $this->db->where('YEAR(tanggal_pinjam)', $tahun);
        }

        $data['peminjaman'] = $this->db->get()->result();

        $html = $this->load->view('laporan_pdf', $data, true);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream("laporan-peminjaman.pdf", [
            "Attachment" => false
        ]);
    }
}