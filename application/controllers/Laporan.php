<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Laporan extends CI_Controller {

    public function peminjaman()
    {
        // dompdf manual (tanpa composer)
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

        $this->load->model('M_peminjaman');

        $data['peminjaman'] = $this->M_peminjaman->getAll();

        $dompdf = new Dompdf();

        $html = $this->load->view('laporan_peminjaman', $data, true);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream("laporan-peminjaman.pdf", ["Attachment" => 0]);
    }
}