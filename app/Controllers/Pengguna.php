<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\LowonganModel;

class Pengguna extends BaseController
{
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->lowonganModel = new LowonganModel();
    }

    public function home()
    {
        $data = [
            'title' => 'Ultranesia',
            'lowongan' => $this->lowonganModel->getLowongan()
        ];

        return view('pengguna/home', $data);
    }

    public function job_listing()
    {
        $data = [
            'title' => 'Ultranesia',
            'kategori' => $this->kategoriModel->getKategori()
        ];
        return view('pengguna/job_listing', $data);
    }

    public function ajax_lowongan()
    {

        if ($this->request->isAJAX()) {
            $filter = $this->request->getVar('filter');

            if (!empty($filter)) {
                $lowongan = $this->lowonganModel->filterLowongan($filter);
            } else {
                $lowongan = $this->lowonganModel->getLowongan();
            }

            $data = [
                'success' => true,
                'lowongan' => $lowongan
            ];

            return $this->response->setJSON($data);
        }
    }

    public function job_details($id_lowongan)
    {
        $data = [
            'title' => 'Ultranesia',
            'lowongan' => $this->lowonganModel->getLowongan($id_lowongan)
        ];

        return view('pengguna/job_details', $data);
    }
}
