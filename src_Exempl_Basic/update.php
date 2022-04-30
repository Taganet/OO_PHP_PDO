<?php
//Elielder Oliveira
//OO PHP e PDO - Dio ( )

//declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'UPDATE produtos SET descricao = ? WHERE id = ?';

$prepare = $pdo->prepare($sql);

$prepare->bindParam(1, $_GET['newVal']);
$prepare->bindParam(2, $_GET['id']);
$prepare->execute();

echo "Foram atualizado(s): ";
echo $prepare->rowCount();
?>