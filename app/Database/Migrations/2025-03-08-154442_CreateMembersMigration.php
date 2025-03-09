<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMembersMigration extends Migration
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
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => 64,
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => 128,
                'unique'        => true,
                'null'          => true,
            ],
            'phone' => [
                'type'          => 'VARCHAR',
                'constraint'    => 18,
                'unique'        => true,
                'null'          => true,
            ],
            'address' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
                'null'          => true,
            ],
            'gender' => [
                'type'          => 'ENUM',
                'constraint'    => ['L', 'P'],
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
        $this->forge->createTable('members', true);
    }

    public function down()
    {
        $this->forge->dropTable('members');
    }
}
