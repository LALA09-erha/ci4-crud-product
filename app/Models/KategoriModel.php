<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    // Initialize model
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['kategori' , 'nama_kategori'];
    protected $returnType = 'array';

}