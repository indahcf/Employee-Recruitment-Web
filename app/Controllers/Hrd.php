<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LowonganModel;
use App\Models\LamaranModel;
use App\Models\KategoriModel;

class Hrd extends BaseController
{
    protected $auth;
    protected $userModel;
    protected $lowonganModel;
    protected $lamaranModel;
    public function __construct()
    {
        $this->auth = service('authentication');
        $this->userModel = new UserModel();
        $this->lowonganModel = new LowonganModel();
        $this->lamaranModel = new LamaranModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $jumlahLowongan = $this->lowonganModel->get()->resultID->num_rows;
        $jumlahLamaran = $this->lamaranModel->get()->resultID->num_rows;
        $jumlahKategori = $this->kategoriModel->get()->resultID->num_rows;
        $data = [
            'title' => 'Dashboard',
            'jumlahLowongan' => $jumlahLowongan,
            'jumlahLamaran' => $jumlahLamaran,
            'jumlahKategori' => $jumlahKategori
        ];

        return view('hrd/dashboard/index', $data);
    }

    public function ubah_password()
    {
        $data = [
            'title' => 'Ubah Password',
            'validation' => \Config\Services::validation()
        ];

        return view('hrd/ubah_password/index', $data);
    }

    function update_password()
    {
        if (!$this->validate([
            'password_lama' => [
                'rules' => 'required',
                'label' => 'Password Lama',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'password_baru' => [
                'rules' => 'required',
                'label' => 'Password Baru',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'konfirm_password' => [
                'rules' => 'required|matches[password_baru]',
                'label' => 'Konfirm Password Baru',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} harus sama'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hrd/ubah_password/index/' . $this->request->getVar('id'))->withInput()->with('validation', $validation->getErrors());
        }

        $id = user_id();
        $userModel = new UserModel();
        $rowData = $userModel->find($id);
        $passwordUser = $rowData->password_hash;
        $request = $this->request;

        if (password_verify(base64_encode(hash('sha384', service('request')->getPost('password_lama'), true)), $passwordUser)) {
            $rowData->setPassword($request->getPost('password_baru'));
            $userModel->save($rowData);
            session()->setFlashdata('pesan', 'Password berhasil diubah.');
        } else {
            session()->setFlashdata('pesan', 'Password yang Anda masukan salah!');
        }

        return redirect()->to('/hrd/ubah_password/index');
    }
}
