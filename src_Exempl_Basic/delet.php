<?php
//Elielder Oliveira
//OO PHP e PDO - Dio ( )

//declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'DELETE FROM produtos WHERE id = ?';

$prepare = $pdo->prepare($sql);

$prepare->bindParam(1, $_GET['id']);
$prepare->execute();

echo "Foram excluido(s): ";
echo $prepare->rowCount();
?>