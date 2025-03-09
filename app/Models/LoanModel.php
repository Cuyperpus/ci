<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table            = 'loans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'member_id',
        'book_detail_id',
        'quantity',
        'due_date',
        'return_date',
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
        'member_id' => [
            'label' => 'Anggota',
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
        'quantity' => [
            'label' => 'Kuantitas',
            'rules' => [
                'required',
                'numeric',
                'max_length[2]',
            ],
            'errors' => [],
        ],
        'due_date' => [
            'label' => 'Tanggal Batas Pengembalian',
            'rules' => [
                'required',
                'valid_date[Y-m-d H:i:s]',
            ],
            'errors' => [],
        ],
        'return_date' => [
            'label' => 'Tanggal Pengembalian',
            'rules' => [
                'permit_empty',
                'valid_date[Y-m-d H:i:s]',
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
