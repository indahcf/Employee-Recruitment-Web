<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\LowonganModel;

class Lowongan extends BaseController
{
    protected $kategori;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->lowonganModel = new LowonganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lowongan Pekerjaan',
            'lowongan' => $this->lowonganModel->getLowongan()
        ];

        return view('hrd/lowongan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Lowongan Pekerjaan',
            'kategori' => $this->kategoriModel->getKategori(),
            'validation' => \Config\Services::validation()
        ];

        return view('hrd/lowongan/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required',
                'label' => 'Kategori Pekerjaan',
                'errors' => [
                    'required' => '{field} harus dipilih.'
                ]
            ],
            'divisi' => [
                'rules' => 'required',
                'label' => 'Divisi Pekerjaan',
                'errors' => [
                    'required' => '{field} harus dipilih.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'label' => 'Deskripsi Pekerjaan',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'persyaratan' => [
                'rules' => 'required',
                'label' => 'Persyaratan',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'skills' => [
                'rules' => 'required',
                'label' => 'Skills',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'total_posisi' => [
                'rules' => 'required',
                'label' => 'Total Posisi',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'deadline' => [
                'rules' => 'required',
                'label' => 'Deadline',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/lowongan/create')->withInput()->with('validation', $validation->getErrors());
        }

        $this->lowonganModel->save([
            'id_kategori' => $this->request->getVar('kategori'),
            'nama_divisi' => $this->request->getVar('divisi'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'persyaratan' => $this->request->getVar('persyaratan'),
            'skills' => $this->request->getVar('skills'),
            'total_posisi' => $this->request->getVar('total_posisi'),
            'deadline' => $this->request->getVar('deadline')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/hrd/lowongan');
    }

    public function delete($id_lowongan)
    {
        $this->lowonganModel->delete($id_lowongan);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/hrd/lowongan');
    }

    public function edit($id_lowongan)
    {
        $data = [
            'title' => 'Edit Lowongan Pekerjaan',
            'validation' => \Config\Services::validation(),
            'lowongan' => $this->lowonganModel->getLowongan($id_lowongan),
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('hrd/lowongan/edit', $data);
    }

    public function update($id_lowongan)
    {

        if (!$this->validate([
            'kategori' => [
                'rules' => 'required',
                'label' => 'Kategori Pekerjaan',
                'errors' => [
                    'required' => '{field} harus dipilih.'
                ]
            ],
            'divisi' => [
                'rules' => 'required',
                'label' => 'Divisi Pekerjaan',
                'errors' => [
                    'required' => '{field} harus dipilih.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'label' => 'Deskripsi Pekerjaan',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'persyaratan' => [
                'rules' => 'required',
                'label' => 'Persyaratan',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'skills' => [
                'rules' => 'required',
                'label' => 'Skills',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'total_posisi' => [
                'rules' => 'required',
                'label' => 'Total Posisi',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'deadline' => [
                'rules' => 'required',
                'label' => 'Deadline',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hrd/lowongan/edit/' . $id_lowongan)->withInput()->with('validation', $validation->getErrors());
        }

        $this->lowonganModel->save([
            'id_lowongan' => $id_lowongan,
            'id_kategori' => $this->request->getVar('kategori'),
            'nama_divisi' => $this->request->getVar('divisi'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'persyaratan' => $this->request->getVar('persyaratan'),
            'skills' => $this->request->getVar('skills'),
            'total_posisi' => $this->request->getVar('total_posisi'),
            'deadline' => $this->request->getVar('deadline')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/hrd/lowongan');
    }
}
