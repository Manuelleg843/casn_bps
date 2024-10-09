<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCasnBpsTables extends Migration
{
    public function up()
    {
        // Users Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'username' => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255],
            'role' => ['type' => 'ENUM', 'constraint' => ['admin', 'applicant'], 'default' => 'applicant'],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');

        // Announcements Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'content' => ['type' => 'TEXT'],
            'publish_date' => ['type' => 'DATE'],
            'category' => ['type' => 'ENUM', 'constraint' => ['CPNS', 'PPPK']],
            'is_active' => ['type' => 'BOOLEAN', 'default' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('announcements');

        // Documents Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'announcement_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'TEXT', 'null' => true],
            'file_path' => ['type' => 'VARCHAR', 'constraint' => 255],
            'publish_date' => ['type' => 'DATE'],
            'document_type' => ['type' => 'VARCHAR', 'constraint' => 50],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('announcement_id', 'announcements', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('documents');

        // FAQ Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'question' => ['type' => 'TEXT'],
            'answer' => ['type' => 'TEXT'],
            'category' => ['type' => 'ENUM', 'constraint' => ['General', 'CPNS', 'PPPK']],
            'is_active' => ['type' => 'BOOLEAN', 'default' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('faq');

        // Job_Positions Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'TEXT', 'null' => true],
            'requirements' => ['type' => 'TEXT', 'null' => true],
            'category' => ['type' => 'ENUM', 'constraint' => ['CPNS', 'PPPK']],
            'quota' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'is_active' => ['type' => 'BOOLEAN', 'default' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('job_positions');

        // Applications Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'job_position_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['submitted', 'under review', 'accepted', 'rejected']],
            'application_date' => ['type' => 'DATE'],
            'last_updated' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('job_position_id', 'job_positions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('applications');

        // Application_Documents Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'application_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'document_type' => ['type' => 'VARCHAR', 'constraint' => 50],
            'file_path' => ['type' => 'VARCHAR', 'constraint' => 255],
            'upload_date' => ['type' => 'DATE'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('application_id', 'applications', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('application_documents');

        // Selection_Stages Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT', 'null' => true],
            'start_date' => ['type' => 'DATE', 'null' => true],
            'end_date' => ['type' => 'DATE', 'null' => true],
            'category' => ['type' => 'ENUM', 'constraint' => ['CPNS', 'PPPK']],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('selection_stages');

        // Applicant_Stage_Results Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'application_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'selection_stage_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'score' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['passed', 'failed']],
            'remarks' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('application_id', 'applications', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('selection_stage_id', 'selection_stages', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('applicant_stage_results');

        // Contact_Information Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'department_name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'address' => ['type' => 'TEXT', 'null' => true],
            'phone' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'website' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'social_media_links' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contact_information');
    }

    public function down()
    {
        $this->forge->dropTable('contact_information');
        $this->forge->dropTable('applicant_stage_results');
        $this->forge->dropTable('selection_stages');
        $this->forge->dropTable('application_documents');
        $this->forge->dropTable('applications');
        $this->forge->dropTable('job_positions');
        $this->forge->dropTable('faq');
        $this->forge->dropTable('documents');
        $this->forge->dropTable('announcements');
        $this->forge->dropTable('users');
    }
}
