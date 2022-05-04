<?php

namespace App\Models;

use CodeIgniter\Model;

class LamaranModel extends Model
{
    protected $table            = 'lamaran';
    protected $primaryKey       = 'id_lamaran';
    protected $allowedFields    = ['id', 'id_lowongan', 'tgl_lamaran', 'status_lamaran', 'jadwal_interview'];

    public function getLamaran($id_lamaran = false)
    {
        if ($id_lamaran == false) {
            return $this->select('users.fullname, lamaran.*, lowongan.nama_divisi')->join('users', 'lamaran.id=users.id')->join('lowongan', 'lamaran.id_lowongan=lowongan.id_lowongan')->findAll();
        }

        return $this->select('users.*, lamaran.*, lowongan.nama_divisi')->where(['lamaran.id_lamaran' => $id_lamaran])->join('users', 'lamaran.id=users.id')->join('lowongan', 'lamaran.id_lowongan=lowongan.id_lowongan')->first();
    }

    public function countStatusIsOpen()
    {
        $id = user_id();
        $where = "id = {$id} AND (status != 'ditolak')";
        return $this->where($where)->countAll();
    }

    public function view_by_date($tgl_awal, $tgl_akhir)
    {
        return $this->select('users.fullname, lamaran.*, lowongan.nama_divisi')->join('users', 'lamaran.id=users.id')->join('lowongan', 'lamaran.id_lowongan=lowongan.id_lowongan')->where('tgl_lamaran BETWEEN "' . $tgl_awal . '" AND "' . $tgl_akhir . '"')->findAll(); // Tambahkan where tanggal nya
    }
}
