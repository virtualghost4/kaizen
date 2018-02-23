<?php

include 'conexion.php';

session_start();


$username = $_POST['user'];
$password = $_POST['password'];

$sql = "SELECT COUNT(*) FROM user WHERE username = '$username' AND password = '$password'";
$statement = $pdo->prepare($sql);
$statement->execute(array());
$result    = $statement->fetchAll();
$total = $result[0]['COUNT(*)'];


if ($total > 0) {    
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
        echo "Bienvenido! " . $_SESSION['username'];
        echo "<br><br><a href=admin/index.php>Panel de Control</a>"; 
     }else{
        echo "else";
     }

     sleep(3);
     header('Location:admin/index.php');
?>