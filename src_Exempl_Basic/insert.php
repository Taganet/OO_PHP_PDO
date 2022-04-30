<?php
//Elielder Oliveira
//OO PHP e PDO - Dio ( )

$pdo = require 'connect.php';
$sql = 'INSERT INTO produtos(descricao) VALUES(?)';

$prepare = $pdo->prepare($sql);

$prepare->bindParam(1, $_GET['descricao']);
$prepare->execute();

echo "Foram inserido(s): ";
echo $prepare->rowCount();
?>