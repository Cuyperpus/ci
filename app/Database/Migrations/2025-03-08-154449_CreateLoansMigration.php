<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLoansMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'member_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'book_detail_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'quantity' => [
                'type'          => 'TINYINT',
                'constraint'    => 32,
                'unsigned'      => true,
                'default'       => 1,
            ],
            'due_date' => [
                'type'           => 'DATETIME',
            ],
            'return_date' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('book_detail_id', 'book_details', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('loans', true);
    }

    public function down()
    {
        $this->forge->dropTable('loans');
    }
}
