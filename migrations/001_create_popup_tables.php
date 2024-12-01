<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_popup_tables extends CI_Migration {

    public function up() {
        // Popup Configurations table
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'text' => [
                'type' => 'TEXT',
                'null' => FALSE
            ],
            'style' => [
                'type' => 'TEXT',
                'null' => FALSE
            ],
            'conditions' => [
                'type' => 'TEXT',
                'null' => FALSE
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => FALSE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => FALSE
            ]
        ]);
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('popup_configurations');

        // API Keys table
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'key' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
                'null' => FALSE
            ],
            'level' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => FALSE
            ],
            'ignore_limits' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ],
            'is_private_key' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ],
            'ip_addresses' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'date_created' => [
                'type' => 'DATETIME',
                'null' => FALSE
            ]
        ]);
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('keys');
    }

    public function down() {
        $this->dbforge->drop_table('popup_configurations');
        $this->dbforge->drop_table('keys');
    }
}