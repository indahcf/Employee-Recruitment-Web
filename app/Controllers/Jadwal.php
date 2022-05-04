<?php

namespace App\Controllers;

class Jadwal extends BaseController
{
    public function index()
    {
        $data['title'] = 'Jadwal Wawancara';
        return view('hrd/jadwal/index', $data);
    }
}
