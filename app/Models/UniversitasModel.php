<?php
namespace App\Models;
use CodeIgniter\Model;
class universitasModel extends Model
{
    protected $table = 'universitas'; // nama tabel
    protected $primaryKey = 'no_universitas'; // primary key tabel
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $useAutoIncrement = false;
    // nama semua field pada tabel
    protected $allowedFields =['no_universitas','kode_kecamatan','nama_universitas','alamat_universitas','koordinat'];
    protected $skipValidation = true;
}

