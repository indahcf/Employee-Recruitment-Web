<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class UserModel extends MythModel
{
    protected $allowedFields = [
        'email', 'fullname', 'no_hp', 'password_hash', 'jk', 'tempat_lahir', 'tgl_lahir', 'alamat', 'pendidikan_terakhir', 'univ', 'jurusan', 'tahun_lulus', 'ipk', 'resume', 'portofolio', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash', 'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    ];

    public function getUsers($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['users.id' => $id])->first();
    }
}
