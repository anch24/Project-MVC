<?php

abstract class Model {
	
	protected $db_name = 'crud';

	protected $username = 'root';

	protected $password = '';

	protected $table_name;

	protected $insert_query;

	protected $insert_query_value;

	protected $select_query;

	protected $update_query;

	protected $conn;

	public function init() {
		$this->conn = new Connection;
		$this->conn->connect($this->db_name, $this->username, $this->password);
	}

	public function save() {
		$this->conn->insert($this->table_name, $this->insert_query, $this->insert_query_value);
	}

	public function get() {
		return $this->conn->select($this->table_name, $this->select_query);
	}

	public function search($id) {
		return $this->conn->search($id, $this->table_name);
	}

	public function update($id) {
		$this->conn->update($id, $this->table_name, $this->update_query);
	}

	public function delete($id) {
		$this->conn->delete($id, $this->table_name);
	}

	abstract public function query();

	abstract public function update_query();

}

?>