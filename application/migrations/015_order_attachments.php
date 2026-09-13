<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Migration_order_attachments extends CI_Migration
{
    public function up()
    {
        /* adding new table chat_media */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE,
                'NULL'           => FALSE
            ],
            'message_id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'NULL'           => FALSE
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'NULL'           => TRUE
            ],
            'original_file_name' => [
                'type'           => 'TEXT',
                'NULL'           => FALSE
            ],
            'file_name' => [
                'type'           => 'TEXT',
                'NULL'           => FALSE
            ],
            'file_extension' => [
                'type'           => 'VARCHAR',
                'constraint'     => '64',
                'NULL'           => FALSE
            ],
            'file_size' => [
                'type'           => 'VARCHAR',
                'constraint'     => '256',
                'NULL'           => FALSE
            ],
            'date_created TIMESTAMP default CURRENT_TIMESTAMP',

        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('chat_media');

        /* adding new table custom sms */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE,
                'NULL'           => FALSE
            ],
            'title' => [
                'type'           => 'VARCHAR',
                'constraint'     => '2048',
                'NULL'           => FALSE
            ],
            'message' => [
                'type'           => 'VARCHAR',
                'constraint'     => '4096',
                'NULL'           => FALSE
            ],
            'type' => [
                'type'           => 'VARCHAR',
                'constraint'     => '64',
                'NULL'           => FALSE
            ],
            'date_sent TIMESTAMP default CURRENT_TIMESTAMP',

        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('custom_sms');


        /* adding new table messages */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE,
                'NULL'           => FALSE
            ],
            'from_id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'NULL'           => FALSE
            ],
            'to_id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'NULL'           => FALSE
            ],
            'is_read' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'NULL'           => FALSE,
                'default'        => '1',
            ],
            'message' => [
                'type'           => 'TEXT',
                'NULL'           => FALSE
            ],
            'type' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128',
                'NULL'           => FALSE
            ],
            'media' => [
                'type'           => 'VARCHAR',
                'constraint'     => '256',
                'NULL'           => FALSE
            ],
            'date_created TIMESTAMP default CURRENT_TIMESTAMP',

        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('messages');


        /* adding new table otps */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'auto_increment' => TRUE,
                'NULL'           => FALSE
            ],
            'mobile' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'NULL'           => FALSE
            ],
            'otp' => [
                'type'           => 'VARCHAR',
                'constraint'     => '256',
                'NULL'           => FALSE
            ],
            'varified' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'NULL'           => FALSE,
                'default'        => '0',
                'comment' => '1 : verify | 0: not verify	'
            ],
            'created_at' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'NULL'           => FALSE,
            ],

        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('otps');

        /* adding new fields in orders table */
        $fields = array(
            'attachments' => array(
                'type' => 'VARCHAR',
                'constraint' => '2048',
                'null' => TRUE,
                'after' => 'notes'
            ),
        );
        $this->dbforge->add_column('orders', $fields);
        /* adding new fields in products table */
        $fields = array(
            'is_attachment_required' => array(
                'type' => 'TINYINT',
                'default' => '0',
                'null' => TRUE,
                'after' => 'cancelable_till'
            ),
        );
        $this->dbforge->add_column('products', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_table('chat_media');
        $this->dbforge->drop_table('custom_sms');
        $this->dbforge->drop_table('messages');
        $this->dbforge->drop_table('otps');
        $this->dbforge->drop_column('orders', 'attachments');
        $this->dbforge->drop_column('products', 'is_attachment_required');
    }
}
