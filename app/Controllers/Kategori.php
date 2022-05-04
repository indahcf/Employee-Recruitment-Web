<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        // $kategori = $this->kategoriModel->findAll();
        $data = [
            'title' => 'Kategori Pekerjaan',
            'kategori' => $this->kategoriModel->getKategori()
        ];

        return view('hrd/kategori/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori Pekerjaan',
            'validation' => \Config\Services::validation()
        ];

        return view('hrd/kategori/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required|is_unique[kategori.kategori]',
                'label' => 'Kategori',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kategori/create')->withInput()->with('validation', $validation->getErrors());
        }

        $this->kategoriModel->save([
            'kategori' => $this->request->getVar('kategori')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/hrd/kategori');
    }

    public function delete($id_kategori)
    {
        $this->kategoriModel->delete($id_kategori);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/hrd/kategori');
    }

    public function edit($id_kategori)
    {
        $data = [
            'title' => 'Edit Kategori Pekerjaan',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategoriModel->getKategori($id_kategori)
        ];

        return view('hrd/kategori/edit', $data);
    }

    public function update($id_kategori)
    {
        //cek kategori
        $kategoriLama = $this->kategoriModel->getKategori($this->request->getVar('id_kategori'));
        if ($kategoriLama['kategori'] == $this->request->getVar('kategori')) {
            $rule_kategori = 'required';
        } else {
            $rule_kategori = 'required|is_unique[kategori.kategori]';
        }

        if (!$this->validate([
            'kategori' => [
                'rules' => $rule_kategori,
                'label' => 'Kategori',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hrd/kategori/edit/' . $this->request->getVar('id_kategori'))->withInput()->with('validation', $validation->getErrors());
        }

        $this->kategoriModel->save([
            'id_kategori' => $id_kategori,
            'kategori' => $this->request->getVar('kategori')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/hrd/kategori');
    }
}
