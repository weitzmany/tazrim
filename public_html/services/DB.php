<?php
class DB extends PDO {

    protected static $instance;

    public static function getInstance() {

		if(empty(self::$instance)) {

			$dns = DB_DRIVER .
        ':host=' . DB_HOST .
        ';port=' . DB_PORT .
        ';dbname=' . DB_NAME;

			try {
				self::$instance = new parent($dns, DB_USER, DB_PASS);
				self::$instance->setAttribute(parent::ATTR_ERRMODE, parent::ERRMODE_SILENT);  
				self::$instance->query('SET NAMES utf8');
				self::$instance->query('SET CHARACTER SET utf8');

			} catch(PDOException $error) {
				echo $error->getMessage();
			}

		}

		return self::$instance;
	}

    public function __construct()
    {
        
    }
}
