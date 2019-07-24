<?php

/*
*
* Update note create a new singleton class for database connection
*
*/

class Connection {

	private $conn = null;

	//Database connection
	public function connect($db, $username, $password) {
		try {
	    	$this->conn = new PDO("mysql:host=localhost;db=$db", $username, $password);

	    	// set the PDO error mode to exception
	    	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
		catch(PDOException $e){
	    	echo "<br>" . $e->getMessage();
	    }

	}

	//Insert data
	public function insert($table_name, $insert_query, $insert_query_value) {
		try {
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    	$sql = "INSERT INTO crud.$table_name $insert_query VALUES $insert_query_value";

	    	$this->conn->exec($sql);
    	}
		catch(PDOException $e)
	    {
	    	echo "<br>" . $e->getMessage();
	    }

	}

	//Select data
	public function select($table_name, $select_query) {
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT $select_query FROM crud.$table_name";

    	$stmt = $this->conn->prepare($sql);
    	$stmt->execute();

    	$result = $stmt->fetchAll();

    	return $result;
	}

	//Search data
	public function search($id, $table_name) {
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM crud.$table_name WHERE id=$id";

    	$stmt = $this->conn->prepare($sql);
    	$stmt->execute();

    	$result = $stmt->fetchAll();

    	return $result;
	}

	//Update data
	public function update($id, $table_name, $update_query) {
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "UPDATE crud.$table_name SET $update_query WHERE id=$id";

		$stmt = $this->conn->prepare($sql);

		$stmt->execute();
	}

	//Delete data
	public function delete($id, $table_name) {
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "DELETE FROM crud.$table_name WHERE id=$id";

		$this->conn->exec($sql);
	}

}

 ?>
