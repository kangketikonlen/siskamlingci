<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_submodul extends CI_Migration
{
	protected $table_name = "ak_data_system_modul_sub";
	protected $prefix = "submodul_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'modul_id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
			),
			$this->prefix . 'urutan' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
			),
			$this->prefix . 'root' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'url' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
			),
			$this->prefix . 'roles' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => "0,1"
			),
			'created_by' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => 'System'
			),
			'created_date datetime default current_timestamp',
			'updated_by' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => NULL,
				'null' => TRUE
			),
			'updated_date datetime on update current_timestamp',
			'deleted' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 0
			),
		);

		return $fields;
	}

	private function seed_sample()
	{
		$fields_data = $this->db->field_data($this->table_name);
		$fields = $this->db->list_fields($this->table_name);
		$no = 0;
		foreach ($fields_data as $fields_data) {
			$data = array(
				$fields[$no++] => $fields_data->default
			);
		}
		$this->db->insert($this->table_name, $data);
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
		// Seed database
		$this->seed_sample();
	}

	public function down()
	{
		$this->dbforge->drop_table($this->table_name, TRUE);
	}
}
