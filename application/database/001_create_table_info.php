<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_table_info extends CI_Migration
{
	protected $table_name = "ak_data_system_info";
	protected $prefix = "info_";

	private function generate_fields()
	{
		$fields = array(
			$this->prefix . 'id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			$this->prefix . 'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => "SISKAMLINGCI"
			),
			$this->prefix . 'full_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => "Sistem Keamanan Lingkungan Codeigniter"
			),
			$this->prefix . 'devs' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => "Kangketik"
			),
			$this->prefix . 'devs_url' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => "https://kangketik.web.id"
			),
			$this->prefix . 'registered' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'default' => "KANGKETIK DEVELOPER"
			),
			$this->prefix . 'sponsor' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'sponsor_url' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			$this->prefix . 'status_sosmed' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 0
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
			'updated_date datetime default current_timestamp on update current_timestamp',
			'deleted' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 1
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
