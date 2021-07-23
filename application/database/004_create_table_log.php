<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_log extends CI_Migration
{
	protected $table_name = "ak_data_system_log";
	protected $prefix = "";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => 45,
			),
			$this->prefix . 'timestamp' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE
			),
			$this->prefix . 'data' => array(
				'type' => 'BLOB',
			)
		);

		return $fields;
	}

	public function up()
	{
		// Generate fields
		$fields = $this->generate_fields();
		// Add field from above variables
		$this->dbforge->add_field($fields);
		// Assign key
		$this->dbforge->add_key($this->prefix . 'id', TRUE);
		// Create table
		$this->dbforge->create_table($this->table_name, TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->table_name, TRUE);
	}
}
