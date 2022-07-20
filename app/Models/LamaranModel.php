<?php

namespace App\Models;

use CodeIgniter\Model;

class LamaranModel extends Model
{
    protected $table            = 'lamaran';
    protected $primaryKey       = 'id_lamaran';
    protected $allowedFields    = ['id', 'id_lowongan', 'cv', 'portofolio', 'tgl_lamaran', 'status_lamaran', 'jadwal_interview'];

    public function getLamaran($id_lamaran = false)
    {
        if ($id_lamaran == false) {
            return $this->select('users.fullname, lamaran.*, lowongan.nama_divisi')->join('users', 'lamaran.id=users.id')->join('lowongan', 'lamaran.id_lowongan=lowongan.id_lowongan')->orderBy('tgl_lamaran')->findAll();
        }

        return $this->select('users.*, lamaran.*, lowongan.nama_divisi')->where(['lamaran.id_lamaran' => $id_lamaran])->join('users', 'lamaran.id=users.id')->join('lowongan', 'lamaran.id_lowongan=lowongan.id_lowongan')->first();
    }

    public function getLamaranUser()
    {
        $id = user_id();
        return $this->select('users.fullname, lamaran.*, lowongan.nama_divisi')->join('users', 'lamaran.id=users.id')->join('lowongan', 'lamaran.id_lowongan=lowongan.id_lowongan')->where('lamaran.id', $id)->findAll();
    }

    public function countStatusIsOpen()
    {
        $id = user_id();
        return $this->where('id', $id)->where('status_lamaran !=', 'Ditolak')->countAllResults();
    }

    public function view_by_date($tgl_awal, $tgl_akhir)
    {
        $new_tgl_akhir = date('Y-m-d', strtotime('+1 days', strtotime($tgl_akhir)));
        return $this->select('users.fullname, lamaran.*, lowongan.nama_divisi')->join('users', 'lamaran.id=users.id')->join('lowongan', 'lamaran.id_lowongan=lowongan.id_lowongan')->where('tgl_lamaran BETWEEN "' . $tgl_awal . '" AND "' . $new_tgl_akhir . '"')->orderBy('tgl_lamaran')->findAll();
    }
}
