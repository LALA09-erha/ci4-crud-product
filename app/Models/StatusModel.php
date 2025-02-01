<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
        // Initialize model

    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $allowedFields = ['id_status', 'nama_status'];
    protected $returnType = 'array';


}