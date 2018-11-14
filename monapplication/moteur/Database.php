<?php

class Database {
   static protected $_instance = null;
   protected $_db;

   static public function getInstance() {
      if( is_null(self::$_instance) )
         self::$_instance = new Database();
      return self::$_instance;
   }

   static public function test_connection() {
	   $servername = "localhost";


	   //*** paramètres serveur Dev ***//
	   $username = "root";
	   $password = "";
	   try {
		   $conn = new PDO("mysql:host=$servername;dbname=annuaire_films", $username, $password);
		   // set the PDO error mode to exception
		   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		   echo "Connected successfully";
	   }
	   catch(PDOException $e)
	   {
		   echo "Connection failed: " . $e->getMessage();
	   }
	   //$servername   = "localhost";
	   //$database = "annuaire_films";
	   //$username = "erick";
	   //$password = "Mami90962000!optimic";

	   //// Create connection
	   //$conn = new mysqli($servername, $username, $password);
	   //// Check connection
	   //if ($conn->connect_error) {
	   //    die("Connection failed: " . $conn->connect_error);
	   //}
	   //echo "Connected successfully";
	   return true;
   }





   protected function __construct() {
      // A faire : fichier de config

define ("db_name","annuaire_films");
define ("server_name","localhost");
		//*** paramètres serveur Dev ***//
define ("user","root");
define ("password","");

    $this->_db = new PDO('mysql:host=' .constant("server_name").';dbname=' .constant("db_name") .';charset=utf8', constant('user'),constant('password'));
   }

   public function __call($method, array $arg) {
      // Si on appelle une méthode qui n'existe pas, on
      // delegue cet appel à l'objet PDO $this->_db
      return call_user_func_array(array($this->_db, $method), $arg);
   }
}




