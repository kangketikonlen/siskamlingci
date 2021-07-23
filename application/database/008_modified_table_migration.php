<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Modified_table_migration extends CI_Migration
{
	protected $table_name = "ak_data_system_migration";

	public function up()
	{
		// Add column to table
		$fields = array(
			'updated_date datetime default current_timestamp on update current_timestamp'
		);
		$this->dbforge->add_column($this->table_name, $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column($this->table_name, 'updated_date');
	}
}
