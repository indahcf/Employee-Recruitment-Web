<?php

namespace App\Controllers;

use App\Models\LamaranModel;
use App\Models\UserModel;
use Dompdf\Dompdf;

class Lamaran extends BaseController
{
    public function __construct()
    {
        $this->lamaranModel = new LamaranModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $tgl_awal = $this->request->getVar('tgl_awal');
        $tgl_akhir = $this->request->getVar('tgl_akhir');
        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $lamaran = $this->lamaranModel->getLamaran();
            $url_cetak = 'lamaran/print';
            $label = 'Semua Data Lamaran';
        } else { // Jika terisi
            $lamaran = $this->lamaranModel->view_by_date($tgl_awal, $tgl_akhir);
            $url_cetak = 'lamaran/print?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir;
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
            $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
        }

        $data = [
            'title' => 'Lamaran Pekerjaan',
            'lamaran' => $lamaran,
            'url_cetak' => base_url($url_cetak),
            'label' => $label
        ];

        return view('hrd/lamaran/index', $data);
    }

    public function print()
    {
        $tgl_awal = $this->request->getVar('tgl_awal');
        $tgl_akhir = $this->request->getVar('tgl_akhir');
        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $lamaran = $this->lamaranModel->getLamaran();
            $label = 'Semua Data Lamaran';
        } else { // Jika terisi
            $lamaran = $this->lamaranModel->view_by_date($tgl_awal, $tgl_akhir);
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
            $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
        }

        $data = [
            'lamaran' => $lamaran,
            'label' => $label
        ];

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('hrd/lamaran/print', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        // $dompdf->stream();
        $dompdf->stream('Data Lamaran Pekerjaan.pdf', array("Attachment" => false));
    }

    public function update_status()
    {
        $id_lamaran = $this->request->getVar('id_lamaran');
        $this->lamaranModel->save([
            'id_lamaran' => $id_lamaran,
            'status_lamaran' => $this->request->getVar('status_lamaran'),
            'jadwal_interview' => $this->request->getVar('jadwal_interview')
        ]);

        return redirect()->to('/hrd/lamaran/detail/' . $id_lamaran);
    }

    public function detail($id_lamaran)
    {
        $data = [
            'title' => 'Detail Lamaran Pekerjaan',
            'lamaran' => $this->lamaranModel->getLamaran($id_lamaran)
        ];

        return view('hrd/lamaran/detail', $data);
    }

    function download_resume($id)
    {
        $resume = new userModel();
        $data = $resume->find($id);
        return $this->response->download('img/' . $data->resume, null);
    }

    function download_portofolio($id)
    {
        $portofolio = new userModel();
        $data = $portofolio->find($id);
        return $this->response->download('img/' . $data->portofolio, null);
    }
}
