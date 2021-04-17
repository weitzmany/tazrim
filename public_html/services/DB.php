<?php
class DB extends PDO {

    protected static $instance;

    public static function CON() {

		if(empty(self::$instance)) {

			$dns = DB_DRIVER .
        ':host=' . DB_HOST .
        ';port=' . DB_PORT .
        ';dbname=' . DB_NAME;

			try {
				self::$instance = new self($dns, DB_USER, DB_PASS);
				self::$instance->setAttribute(parent::ATTR_ERRMODE, parent::ERRMODE_SILENT);  
				self::$instance->query('SET NAMES utf8');
				self::$instance->query('SET CHARACTER SET utf8');

			} catch(PDOException $error) {
				echo $error->getMessage();
			}

		}

		return self::$instance;
	}


	public function getAll($sql){

		$stmt = $this->prepare($sql);
        $stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $results;

	}

	public function get($sql){

		$stmt = $this->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		return $result;

	}

	public function set($table,$args){
		$columns = implode ("`, `", array_keys($args));
		$values = implode (", ", array_fill ( 0 , count($args) , '?' ));
		$sql = "INSERT INTO $table (`$columns`) VALUES ($values)";
		$this->prepare($sql)->execute(array_values($args));
	}
	
	
}
