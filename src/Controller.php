<?php 

abstract class Controller {

	abstract public function create();

	abstract public function read();

	abstract public function find($id);

	abstract public function update($id);

	abstract public function delete($id);

	public static function view($url) {
		header('Location: ../'.$url);
 		exit;
	}

}

?>