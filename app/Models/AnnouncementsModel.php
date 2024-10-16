<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementsModel extends Model
{
    protected $table            = 'announcements';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'title',
        'content',
        'publish_date',
        'category',
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

    public function getAnnouncements($category = null, $is_active = true)
    {
        $today = date('Y-m-d');

        if ($category) {
            $builder = $this->db->table($this->table)
                ->select('announcements.id, announcements.title, announcements.content, announcements.publish_date, announcements.category, announcements.is_active, documents.id as document_id, documents.title as document_title, documents.description as document_description, documents.file_path as document_file_path, documents.publish_date as document_publish_date, documents.document_type as document_type')
                ->join('documents', 'announcements.id = documents.announcement_id', 'left')
                ->where('announcements.category', $category)
                ->where('announcements.is_active', $is_active)
                ->where('announcements.publish_date <=', $today)
                ->get();
        } else {
            $builder = $this->db->table($this->table)
                ->select('announcements.id, announcements.title, announcements.content, announcements.publish_date, announcements.category, announcements.is_active, documents.id as document_id, documents.title as document_title, documents.description as document_description, documents.file_path as document_file_path, documents.publish_date as document_publish_date, documents.document_type as document_type')
                ->join('documents', 'announcements.id = documents.announcement_id', 'left')
                ->where('announcements.is_active', $is_active)
                ->where('announcements.publish_date <=', $today)
                ->get();
        }

        $results = $builder->getResultArray();

        $grouped = [];

        foreach ($results as $result) {
            $grouped[$result['id']]['id'] = $result['id'];
            $grouped[$result['id']]['title'] = $result['title'];
            $grouped[$result['id']]['content'] = $result['content'];
            $grouped[$result['id']]['publish_date'] = $result['publish_date'];
            $grouped[$result['id']]['category'] = $result['category'];
            $grouped[$result['id']]['is_active'] = $result['is_active'];

            if ($result['document_id']) {
                $grouped[$result['id']]['documents'][] = [
                    'id' => $result['document_id'],
                    'title' => $result['document_title'],
                    'description' => $result['document_description'],
                    'file_path' => $result['document_file_path'],
                    'publish_date' => $result['document_publish_date'],
                    'document_type' => $result['document_type'],
                ];
            }
        }

        return $grouped;
    }

    public function getAllAnnouncements($category = null)
    {
        if ($category) {
            $builder = $this->db->table($this->table)
                ->select('announcements.id, announcements.title, announcements.content, announcements.publish_date, announcements.category, announcements.is_active, documents.id as document_id, documents.title as document_title, documents.description as document_description, documents.file_path as document_file_path, documents.publish_date as document_publish_date, documents.document_type as document_type')
                ->join('documents', 'announcements.id = documents.announcement_id', 'left')
                ->where('announcements.category', $category)
                ->get();
        } else {
            $builder = $this->db->table($this->table)
                ->select('announcements.id, announcements.title, announcements.content, announcements.publish_date, announcements.category, announcements.is_active, documents.id as document_id, documents.title as document_title, documents.description as document_description, documents.file_path as document_file_path, documents.publish_date as document_publish_date, documents.document_type as document_type')
                ->join('documents', 'announcements.id = documents.announcement_id', 'left')
                ->get();
        }

        $results = $builder->getResultArray();

        $grouped = [];

        foreach ($results as $result) {
            $grouped[$result['id']]['id'] = $result['id'];
            $grouped[$result['id']]['title'] = $result['title'];
            $grouped[$result['id']]['content'] = $result['content'];
            $grouped[$result['id']]['publish_date'] = $result['publish_date'];
            $grouped[$result['id']]['category'] = $result['category'];
            $grouped[$result['id']]['is_active'] = $result['is_active'];

            if ($result['document_id']) {
                $grouped[$result['id']]['documents'][] = [
                    'id' => $result['document_id'],
                    'title' => $result['document_title'],
                    'description' => $result['document_description'],
                    'file_path' => $result['document_file_path'],
                    'publish_date' => $result['document_publish_date'],
                    'document_type' => $result['document_type'],
                ];
            }
        }

        return $grouped;
    }
}
