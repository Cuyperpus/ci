<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table            = 'members';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
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
        'name' => [
            'label' => 'Nama',
            'rules' => [
                'required',
                'alpha_numeric_punct',
                'max_length[64]',
            ],
            'errors' => [],
        ],
        'email' => [
            'label' => 'Email',
            'rules' => [
                'permit_empty',
                'valid_email',
                'max_length[128]',
                'is_unique[members.email]',
            ],
            'errors' => [],
        ],
        'phone' => [
            'label' => 'Nomor HP',
            'rules' => [
                'permit_empty',
                'string',
                'max_length[20]',
                'is_unique[members.phone]',
            ],
            'errors' => [],
        ],
        'address' => [
            'label' => 'Alamat',
            'rules' => [
                'permit_empty',
                'string',
                'max_length[255]',
            ],
            'errors' => [],
        ],
        'gender' => [
            'label' => 'Kelamin',
            'rules' => [
                'required',
                'in_list[L,P]',
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
