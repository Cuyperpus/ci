<?php

namespace App\Models;

use CodeIgniter\Model;

class BookDetailModel extends Model
{
    protected $table            = 'book_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'book_id',
        'publisher',
        'year',
        'book_cover',
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
        'book_id' => [
            'label' => 'Buku',
            'rules' => [
                'required',
                'is_natural_no_zero',
                'max_length[11]',
            ],
            'errors' => [],
        ],
        'publisher' => [
            'label' => 'Penerbit',
            'rules' => [
                'required',
                'string',
                'max_length[64]',
            ],
            'errors' => [],
        ],
        'year' => [
            'label' => 'Tahun',
            'rules' => [
                'required',
                'valid_date[Y]',
            ],
            'errors' => [],
        ],
        'book_cover' => [
            'label' => 'Sampul',
            'rules' => [
                'permit_empty',
                'string',
                'max_length[255]',
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
