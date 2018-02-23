<?php
session_start();
require_once('../conexion.php');

$id        = isset($_GET['id']) ? $_GET['id'] : 0;

$sql       = 'DELETE FROM slider WHERE id = ?';

$statement = $pdo->prepare($sql);
$statement->execute(array($id));
$result    = $statement->fetchAll();

header('Location: read_slider.php')


?>