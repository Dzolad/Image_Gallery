<?php
class User {
	
	// Holder property for the connection to the database;
	protected $database;
	
	// Should I protect the data in a separate variable? Why?
	public $data;
	
	// Dependancy injection of the database connection.
	public function __construct(Database $database) { $this->database = $database; }
	
	public function find($id = NULL) {
		if (!$id) {
            $this->data = $this->database->run("SELECT * FROM users");
        } else {
			$this->data = $this->database->run("SELECT * FROM users WHERE id = ?", [$id])->fetch();
		}
	}
	
	public function check_if_empty($holder) {
		if(empty($holder)) { return false; }
	}
	
	public function verify_user($username, $password) {

		$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
		$results = $this->database->run($sql, [$username, $password])->fetch();
		$this->check_if_empty($results);
		return $results;
	}
}
?>