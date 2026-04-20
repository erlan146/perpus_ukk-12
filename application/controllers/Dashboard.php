<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Dashboard extends CI_Controller {

    public function admin()
    {
        $data['total_user'] = $this->db->count_all('users');
        $data['total_peminjaman'] = $this->db->count_all('peminjaman');

        $bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

        $user_chart = array_fill(0,12,0);
        $pinjam_chart = array_fill(0,12,0);

        /* ================= USER CHART FIX TOTAL ================= */
        if ($this->db->table_exists('users')) {

            // ❗ FIX: pakai fallback kalau created_at bermasalah
            if ($this->db->field_exists('created_at','users')) {

                $q = $this->db->query("
                    SELECT 
                        MONTH(created_at) as bulan, 
                        COUNT(*) as total
                    FROM users
                    WHERE created_at IS NOT NULL
                    GROUP BY MONTH(created_at)
                ");

                foreach($q->result() as $r){
                    if($r->bulan >= 1 && $r->bulan <= 12){
                        $user_chart[$r->bulan - 1] = (int)$r->total;
                    }
                }

            } else {
                // 🔥 kalau tidak ada created_at → tetap tampil data
                $user_chart = array_fill(0,12,0);
                $user_chart[date('n') - 1] = $this->db->count_all('users');
            }
        }

        /* ================= PEMINJAMAN CHART FIX ================= */
        if ($this->db->table_exists('peminjaman') && $this->db->field_exists('tanggal_pinjam','peminjaman')) {

            $q = $this->db->query("
                SELECT 
                    MONTH(tanggal_pinjam) as bulan, 
                    COUNT(*) as total
                FROM peminjaman
                WHERE tanggal_pinjam IS NOT NULL
                GROUP BY MONTH(tanggal_pinjam)
            ");

            foreach($q->result() as $r){
                if($r->bulan >= 1 && $r->bulan <= 12){
                    $pinjam_chart[$r->bulan - 1] = (int)$r->total;
                }
            }
        }

        $data['bulan'] = json_encode($bulan);
        $data['user_chart'] = json_encode($user_chart);
        $data['pinjam_chart'] = json_encode($pinjam_chart);

        $this->load->view('dashboard_admin', $data);
    }

    /* ================= CETAK KARTU FIX TOTAL ================= */
    public function cetak_kartu($id)
    {
        $user = $this->db->get_where('users', ['id' => $id])->row();

        if (!$user) {
            show_404();
        }

        require_once APPPATH.'third_party/dompdf/autoload.inc.php';

        $dompdf = new Dompdf();

        $html = $this->load->view('kartu_pdf', ['user' => $user], true);

        $dompdf->loadHtml($html);

        // 🔥 FIX UTAMA BIAR TIDAK KE POTONG
        $dompdf->setPaper('A6', 'portrait');

        $options = $dompdf->getOptions();
        $options->set([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);

        $dompdf->setOptions($options);

        $dompdf->render();

        // 🔥 BIAR BISA PRINT (BUKAN AUTO DOWNLOAD)
        $dompdf->stream("kartu-siswa.pdf", [
            "Attachment" => false
        ]);
    }

    public function user()
    {
        $this->load->view('dashboard_user');
    }
}