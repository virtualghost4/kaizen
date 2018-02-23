<?php 

$dsn = 'mysql:dbname=kaizendb;host=127.0.0.1';
$user = 'homestead';
$password = 'secret';

try{

	$pdo = new PDO($dsn,$user,$password);

}catch(PDOexception $e){
	echo 'error al conectar: ' .$e->getMessage();
       }

?>



