<?php

namespace App\Controllers;

use App\Models\UserModel;

class Hrd extends BaseController
{
    protected $auth;
    protected $userModel;
    public function __construct()
    {
        $this->auth = service('authentication');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // dd($this->auth->user()->getRoles());
        $data['title'] = 'Dashboard HRD';
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
