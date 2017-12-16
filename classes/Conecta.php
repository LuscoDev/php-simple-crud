<?php

class Conecta{
	

	function getConexao(){
		define('MYSQL_HOST', 'localhost');
		define('MYSQL_USER', 'root');
		define('MYSQL_PASSWORD', '');
		define('MYSQL_DB_NAME', 'dbbusca');	

		try{
			return $PDO = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB_NAME,MYSQL_USER,MYSQL_PASSWORD);
			//$PDO->exec("set names utf8");
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
	}

	
}