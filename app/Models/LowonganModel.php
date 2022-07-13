<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class LowonganModel extends Model
{
    protected $table            = 'lowongan';
    protected $primaryKey       = 'id_lowongan';
    protected $allowedFields    = ['id_kategori', 'nama_divisi', 'deskripsi', 'persyaratan', 'skills', 'total_posisi', 'deadline'];

    public function getLowongan($id_lowongan = false)
    {
        if ($id_lowongan == false) {
            return $this->join('kategori', 'lowongan.id_kategori=kategori.id_kategori')->findAll();
        }

        return $this->where(['lowongan.id_lowongan' => $id_lowongan])->join('kategori', 'lowongan.id_kategori=kategori.id_kategori')->first();
    }

    public function editLowongan($id_lowongan = false)
    {
        if ($id_lowongan == false) {
            return $this->findAll();
        }

        return $this->where(['lowongan.id_lowongan' => $id_lowongan])->first();
    }

    public function filterLowongan($id_kategori)
    {
        return $this->join('kategori', 'lowongan.id_kategori=kategori.id_kategori')->whereIn('lowongan.id_kategori', $id_kategori)->where('deadline >=', Time::today())->findAll();
    }

    public function deadlineLowongan()
    {
        return $this->join('kategori', 'lowongan.id_kategori=kategori.id_kategori')->where('deadline >=', Time::today())->findAll();
    }
}
