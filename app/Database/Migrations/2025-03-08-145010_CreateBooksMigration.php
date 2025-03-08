<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBooksMigration extends Migration
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
            'slug' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'unique'         => true,
            ],
            'title' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128,
                'unique'         => true,
            ],
            'isbn' => [
                'type'           => 'VARCHAR',
                'constraint'     => 13,
                'unique'         => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('books', true);
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
