<?php
//Elielder Oliveira
//OO PHP e PDO - Dio ( )

//declare(strict_types=1);

$pdo = null;

try
{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=exemplo;', 'root', '0110');

} 
catch(Exception $e)
{
    echo $e->getMessage();
    die();
}

return $pdo;
?>