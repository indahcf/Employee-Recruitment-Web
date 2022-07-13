<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\UserModel;
use App\Models\LowonganModel;
use App\Models\LamaranModel;

class Pelamar extends BaseController
{
    protected $session;
    protected $userModel;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->userModel = new UserModel();
        $this->lowonganModel = new LowonganModel();
        $this->lamaranModel = new LamaranModel();
        $this->session = \Config\Services::session();
    }

    public function riwayat_lamaran()
    {
        $data = [
            'title' => 'Riwayat Lamaran',
            'lamaran' => $this->lamaranModel->getLamaranUser()
        ];
        return view('pelamar/riwayat_lamaran', $data);
    }

    public function form_pendaftaran()
    {
        $id_lowongan = $this->session->get('id_lowongan');
        $lowongan = $this->lowonganModel->find($id_lowongan);
        $nama_divisi = $lowongan['nama_divisi'];
        $data = [
            'title' => 'Form Pendaftaran',
            'divisi' => $nama_divisi,
            'user' => $this->userModel->getUsers(user_id()),
            'validation' => \Config\Services::validation()
        ];

        return view('pelamar/form_pendaftaran', $data);
    }

    public function pilih_lowongan($id_lowongan)
    {
        $this->session->set('id_lowongan', $id_lowongan);
        return redirect()->to('/pelamar/form_pendaftaran');
    }

    public function create()
    {
        // dd(user_id());
        // dd($this->lamaranModel->countStatusIsOpen());
        if ($this->lamaranModel->countStatusIsOpen() > 0) {
            session()->setFlashdata('pesan', 'Maaf, Anda belum boleh melamar terlebih dahulu karena Anda sedang melamar/sudah diterima di posisi ini.');
            return redirect()->to('/pelamar/form_pendaftaran');
        }

        //validasi input
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'label' => 'Nama Lengkap',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'pendidikan_terakhir' => [
                'rules' => 'required',
                'label' => 'Pendidikan Terakhir',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'label' => 'Jenis Kelamin',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'nama_univ' => [
                'rules' => 'required',
                'label' => 'Universitas',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'label' => 'Tempat Lahir',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'label' => 'Jurusan',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'label' => 'Tanggal Lahir',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'tahun_lulus' => [
                'rules' => 'required',
                'label' => 'Tahun Lulus',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'label' => 'Alamat',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'ipk' => [
                'rules' => 'required',
                'label' => 'IPK',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'label' => 'Email',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'cv' => [
                'rules' => 'uploaded[cv]|max_size[cv,1024]|ext_in[cv,pdf]|mime_in[cv,application/pdf]',
                'label' => 'CV',
                'errors' => [
                    'uploaded' => '{field} harus diisi.',
                    'max_size' => 'Ukuran file terlalu besar.',
                    'ext_in' => 'Yang Anda pilih bukan pdf.',
                    'mime_in' => 'Yang Anda pilih bukan pdf.'
                ]
            ],
            'no_telepon' => [
                'rules' => 'required',
                'label' => 'No Telepon',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/pelamar/form_pendaftaran')->withInput()->with('validation', $validation->getErrors());
            return redirect()->to('/pelamar/form_pendaftaran')->withInput();
        }

        // ambil gambar
        $fileCV = $this->request->getFile('cv');
        $filePortofolio = $this->request->getFile('portofolio');

        $namaCV = null;
        if ($fileCV->isValid()) {
            $namaCV = $fileCV->getRandomName();
            $fileCV->move('img', $namaCV);
        }

        $namaPortofolio = null;
        if ($filePortofolio->isValid()) {
            $namaPortofolio = $filePortofolio->getRandomName();
            $filePortofolio->move('img', $namaPortofolio);
        }

        $id_lowongan = intval($this->session->get('id_lowongan'));
        $lowongan = $this->lowonganModel->find($id_lowongan);
        $nama_divisi = $lowongan['nama_divisi'];
        $this->userModel->save([
            'id' => user_id(),
            'fullname' => $this->request->getVar('nama_lengkap'),
            'pendidikan_terakhir' => $this->request->getVar('pendidikan_terakhir'),
            'jk' => $this->request->getVar('jk'),
            'univ' => $this->request->getVar('nama_univ'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'jurusan' => $this->request->getVar('jurusan'),
            'tgl_lahir' => $this->request->getVar('tanggal_lahir'),
            'tahun_lulus' => $this->request->getVar('tahun_lulus'),
            'alamat' => $this->request->getVar('alamat'),
            'ipk' => $this->request->getVar('ipk'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_telepon')
        ]);

        $this->lamaranModel->save([
            'id' => user_id(),
            'id_lowongan' => $id_lowongan,
            'cv' => $namaCV,
            'portofolio' => $namaPortofolio
        ]);

        session()->setFlashdata('pesan', 'Selamat! Anda telah berhasil mengisi lamaran pada ' . $nama_divisi . '. Anda dapat memantau proses rekrutmen melalui halaman Riwayat Lamaran.');

        return redirect()->to('/pelamar/riwayat_lamaran');
    }

    public function lowongan()
    {
        $data = [
            'title' => 'Ultranesia',
            'kategori' => $this->kategoriModel->getKategori()
        ];

        return view('pelamar/job_listing', $data);
    }

    public function ajax_lowongan()
    {

        if ($this->request->isAJAX()) {
            $filter = $this->request->getVar('filter');

            if (!empty($filter)) {
                $lowongan = $this->lowonganModel->filterLowongan($filter);
            } else {
                $lowongan = $this->lowonganModel->deadlineLowongan();
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

        return view('pelamar/job_details', $data);
    }

    public function ubah_password()
    {
        $data = [
            'title' => 'Ubah Password',
            'validation' => \Config\Services::validation()
        ];

        return view('pelamar/ubah_password', $data);
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
            return redirect()->to('/pelamar/ubah_password/index/' . $this->request->getVar('id'))->withInput()->with('validation', $validation->getErrors());
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

        return redirect()->to('/pelamar/ubah_password/index');
    }
}
