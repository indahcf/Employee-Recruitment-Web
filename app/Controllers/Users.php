<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Myth\Auth\Password;

class Users extends BaseController
{
    protected $usersModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->config = config('Auth');
        $this->auth = service('authentication');
    }

    public function index()
    {
        $data = [
            'title' => 'Users',
            'users' => $this->usersModel->getUsers()
        ];

        return view('hrd/users/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Users',
            'config' => $this->config,
            'validation' => \Config\Services::validation()
        ];

        return view('hrd/users/create', $data);
    }

    public function save()
    {

        //validasi input
        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[users.email]|valid_email',
                'label' => 'Email',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.',
                    'valid_email' => '{field} harus valid.'
                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'label' => 'Nama User',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'label' => 'Role',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'label' => 'No Handphone',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'password'     => [
                'rules' => 'required',
                'label' => 'Password',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'pass_confirm'     => [
                'rules' => 'required|matches[password]',
                'label' => 'Repeat Password',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'matches' => '{field} harus sama'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/users/create')->withInput()->with('validation', $validation->getErrors());
        }

        $password = $this->request->getVar('password');
        $this->usersModel->save([
            'fullname' => $this->request->getVar('fullname'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
            'password_hash' => Password::hash($password),
            'role' => $this->request->getVar('role')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/hrd/users');
    }

    public function delete($id)
    {
        $this->usersModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/hrd/users');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Users',
            'validation' => \Config\Services::validation(),
            'users' => $this->usersModel->getUsers($id)
        ];

        return view('hrd/users/edit', $data);
    }

    public function update($id)
    {

        //validasi input
        if (!$this->validate([
            'fullname' => [
                'rules' => 'required',
                'label' => 'Nama User',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'label' => 'Role',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'label' => 'No Handphone',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hrd/users/edit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation->getErrors());
        }

        $password = $this->request->getVar('password');
        $this->usersModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'no_hp' => $this->request->getVar('no_hp'),
            'role' => $this->request->getVar('role')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/hrd/users');
    }

    public function ubah_password($id)
    {
        $data = [
            'title' => 'Ubah Password Users',
            'validation' => \Config\Services::validation(),
            'users' => $this->usersModel->getUsers($id)
        ];

        return view('hrd/users/ubah_password', $data);
    }

    function update_password($id)
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

            'pass_confirm' => [
                'rules' => 'required|matches[password_baru]',
                'label' => 'Repeat Password',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} harus sama'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/hrd/users/ubah_password/' . $this->request->getVar('id'))->withInput()->with('validation', $validation->getErrors());
        }

        $userModel = new UsersModel();
        $rowData = $userModel->find($id);
        $passwordUser = $rowData['password_hash'];
        $request = $this->request;

        if (password_verify(base64_encode(hash('sha384', service('request')->getPost('password_lama'), true)), $passwordUser)) {
            $userModel->save(['id' => $id, 'password_hash' => Password::hash($request->getPost('password_baru'))]);
            session()->setFlashdata('pesan', 'Password berhasil diubah.');
        } else {
            session()->setFlashdata('pesan', 'Password yang Anda masukan salah!');
        }
        return redirect()->to('/hrd/users');
    }
}
