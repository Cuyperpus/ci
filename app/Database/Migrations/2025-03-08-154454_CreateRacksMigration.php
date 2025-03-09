<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRacksMigration extends Migration
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
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'unique'         => true,
            ],
            'floor' => [
                'type'           => 'VARCHAR',
                'constraint'     => 2,
                'default'        => 1,
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
        $this->forge->createTable('racks', true);
    }

    public function down()
    {
        $this->forge->dropTable('racks');
    }
}
