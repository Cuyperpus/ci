<?php

namespace App\Models;

use CodeIgniter\Model;

class BookDetailAuthorModel extends Model
{
    protected $table            = 'book_detail_authors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'book_detail_id',
        'author_id',
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
        'book_detail_id' => [
            'label' => 'Detail Buku',
            'rules' => [
                'required',
                'is_natural_no_zero',
                'max_length[11]',
            ],
            'errors' => [],
        ],
        'author_id' => [
            'label' => 'Author',
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
