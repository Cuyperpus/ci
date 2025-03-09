<?php

namespace App\Models;

use CodeIgniter\Model;

class RackBookModel extends Model
{
    protected $table            = 'rack_books';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'rack_id',
        'book_detail_id',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'rack_id' => [
            'label' => 'Rak',
            'rules' => [
                'required',
                'is_natural_no_zero',
                'max_length[11]',
            ],
            'errors' => [],
        ],
        'book_detail_id' => [
            'label' => 'Detail Buku',
            'rules' => [
                'required',
                'is_natural_no_zero',
                'max_length[11]',
            ],
            'errors' => [],
        ],
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
