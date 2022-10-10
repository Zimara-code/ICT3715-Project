<?php
    class Examination{
		var $host;
		var $username;
		var $password;
		var $database;
		var $connect;
		var $home_page;
		var $query;
		var $data;
		var $statement;
		var $filedata;
		
		function __construct(){
			$this->host = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->database = "34802193";
			$this->home_page = "http://localhost/online_exam2/department/";
			$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
			
			//session_start();
		}
		
		function execute_query(){
			$this->statement = $this->connect->prepare($this->query);
			$this->statement->execute($this->data);
		}
		
		function total_row(){
			$this->execute_query();
			return $this->statement->rowCount();
		}
		
		function student_session(){
			
		}
	}
?>