<?php
require_once("config.php");

class Database extends PDO {
	
	 public function __construct($host, $dbname, $username, $password, $options = []) {
        try {
			$default_options = [
				// Returns associative arrays as default.
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				
				// Turns on proper srepared statements.
				PDO::ATTR_EMULATE_PREPARES => false,
				
				// Turn on error exceptions.
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			];
			
			$options = array_replace($default_options, $options);
			
			$dsn = 'mysql:host='.$host.';dbname='.$dbname;
			parent::__construct($dsn, $username, $password, $options);
		} catch(PDOException $e) { $this->handle_e($e); }
    }
	
    public function run($sql, $args = NULL) {
        if (!$args) {
             return $this->query($sql);
        }
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
	
	public function handle_e($e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
}

$database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
?>