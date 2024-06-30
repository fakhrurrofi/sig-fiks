<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\UniversitasModel;

class Universitas extends BaseController {
    
    // Method index yang memanggil method tampil
    public function index() {
        $this->tampil();
    }

    // Method untuk menampilkan data universitas
    public function tampil() {
        $universitas = new UniversitasModel();
        // Mengambil semua data di tabel universitas dan kecamatan menggunakan JOIN
        $data['query'] = $universitas->join('kecamatan', 'kecamatan.kode_kecamatan = universitas.kode_kecamatan')->findAll();
        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');
        // Memanggil file view tampil
        echo view('universitas/tampil', $data);
    }

    // Method untuk menampilkan form tambah universitas
    public function tambah() {
        $kecamatan = new KecamatanModel();
        $kecamatan = $kecamatan->findAll();
        $kecamatanOptions = array();
        // Mempersiapkan variabel array
        $kecamatanOptions[''] = 'belum dipilih';
        // Perulangan untuk menghasilkan option value di dropdown kecamatan
        foreach ($kecamatan as $row) {
            $kecamatanOptions[$row->kode_kecamatan] = strtoupper($row->nama_kecamatan);
        }
        // Variabel untuk list dropdown kecamatan
        $data['kecamatanOptions'] = $kecamatanOptions;
        // Memanggil view form tambah
        return view('universitas/tambah', $data);
    }

    // Method untuk menampilkan form edit universitas
    public function edit($no_universitas) {
        $kecamatan = new KecamatanModel();
        $kecamatan = $kecamatan->findAll();
        $kecamatanOptions = array();
        $kecamatanOptions[''] = 'belum dipilih';
        foreach ($kecamatan as $row) {
            $kecamatanOptions[$row->kode_kecamatan] = strtoupper($row->nama_kecamatan);
        }
        $data['kecamatanOptions'] = $kecamatanOptions;
        $universitas = new UniversitasModel();
        // Mengambil data universitas sesuai nilai pada $no_universitas
        $data['query'] = $universitas->find($no_universitas);
        // Mengirimkan id yang berisi nilai $no_universitas sebagai acuan untuk update data di method update()
        $data['id'] = $no_universitas;
        return view('universitas/edit', $data);
    }

    // Method untuk menyimpan data universitas baru
    public function simpan() {
        $universitas = new UniversitasModel();
        // Mengambil data dari masing-masing input pada form tambah
        // dan disimpan pada array untuk disimpan ke tabel universitas
        $data_universitas = [
            'no_universitas' => $this->request->getVar('no_universitas'),
            'kode_kecamatan' => $this->request->getVar('kode_kecamatan'),
            'nama_universitas' => $this->request->getVar('nama_universitas'),
            'alamat_universitas' => $this->request->getVar('alamat_universitas'),
            'koordinat' => $this->request->getVar('koordinat')
        ];
        // Menggunakan query builder insert untuk menyimpan ke tabel universitas
        $universitas->insert($data_universitas);
        // Method affectedRows() mengembalikan nilai 1 jika insert berhasil, nilai 0 jika gagal
        if ($universitas->affectedRows() > 0) {
            // Persiapkan pesan jika insert berhasil
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            // Persiapkan pesan jika insert gagal
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        // Mengirimkan nilai msg melalui flashdata (session sekali pakai)
        session()->setFlashdata('msg', $msg);
        // Memanggil index pada controller universitas agar setelah simpan, tampilan kembali ke tabel CRUD
        return redirect()->to('universitas');
    }

    // Method untuk mengupdate data universitas
    public function update() {
        $universitas = new UniversitasModel();
        // Mengambil input hidden id dari form edit
        $id = $this->request->getVar('id');
        $data_universitas = [
            'no_universitas' => $this->request->getVar('no_universitas'),
            'kode_kecamatan' => $this->request->getVar('kode_kecamatan'),
            'nama_universitas' => $this->request->getVar('nama_universitas'),
            'alamat_universitas' => $this->request->getVar('alamat_universitas'),
            'koordinat' => $this->request->getVar('koordinat')
        ];
        // Menggunakan query builder update untuk mengubah data di tabel universitas berdasarkan id (no_universitas)
        $universitas->update($id, $data_universitas);
        if ($universitas->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('universitas');
    }

    // Method untuk menghapus data universitas
    public function hapus($no_universitas) {
        $universitas = new UniversitasModel();
        // Menggunakan query builder delete untuk menghapus data di tabel universitas sesuai no_universitas
        $universitas->delete(['no_universitas' => $no_universitas]);
        if ($universitas->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('universitas');
    }
}
?>
