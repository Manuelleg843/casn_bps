<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table            = 'faq';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'question',
        'answer',
        'is_active',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
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

    public function getFaq($category = null, $is_active = true)
    {
        if ($category) {
            $builder = $this->db->table($this->table)
                ->select('faq.id, faq.question, faq.answer, faq.is_active')
                ->where('faq.category', $category)
                ->where('faq.is_active', $is_active)
                ->get();
        } else {
            $builder = $this->db->table($this->table)
                ->select('faq.id, faq.question, faq.answer, faq.is_active')
                ->where('faq.is_active', $is_active)
                ->get();
        }

        return $builder->getResultArray();
    }
}
