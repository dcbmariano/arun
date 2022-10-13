<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriarTabelaProtein extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
         $this->forge->addField([
             'gi' => ['type' => 'VARCHAR', 'constraint' => 10],
             'protein_id' => ['type' => 'VARCHAR', 'constraint' => 50],
             'location' => ['type' => 'VARCHAR', 'constraint' => 50],
             'protein_name' => ['type' => 'VARCHAR', 'constraint' => 255],
             'reference' => ['type' => 'VARCHAR', 'constraint' => 50],             'created_at' => ['type' => 'DATETIME', 'null' => TRUE],
             'updated_at' => ['type' => 'DATETIME', 'null' => TRUE],
             'deleted_at' => ['type' => 'DATETIME', 'null' => TRUE]
         ])->createTable('proteins');
    }

    public function down()
    {
        $this->forge->dropTable('proteins');
    }
}
