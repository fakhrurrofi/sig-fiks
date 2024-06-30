<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        $data =[
            'judul'=>'Dashbord',
            'page'=>'../Views/Dashbord'
        ];
        return view('Dashbord',$data);

    }
    public function kecamatan(): string
    {
        $data =[
            'judul'=>'kecamatan',
            'page'=>'../Views/kecamatan/tampil'
        ];
        return view('tampil',$data);
    }
    public function universitas(): string
    {
        $data =[
            'judul'=>'universitas',
            'page'=>'v_universitas'
        ];
        return view('v_universitas',$data);
    }
}
