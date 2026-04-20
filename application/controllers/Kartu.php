<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Kartu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // dompdf
        require_once APPPATH.'third_party/dompdf/autoload.inc.php';

        // 🔥 hanya admin boleh
        if ($this->session->userdata('role') != 'admin') {
            redirect('dashboard/user');
        }
    }

    // ================= CETAK KARTU =================
    public function cetak($id)
    {
        $user = $this->db->get_where('users', ['id' => $id])->row();

        if (!$user) {
            show_404();
        }

        $html = $this->load->view('kartu_pdf', ['user' => $user], true);

        $dompdf = new Dompdf();
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A6', 'landscape');
        $dompdf->render();

        $dompdf->stream("kartu-".$user->username.".pdf", ["Attachment" => 0]);
    }
}