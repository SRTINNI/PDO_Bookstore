<?php 
require 'db.php';

$sql = 'SELECT *FROM books';
$statement = $connection->prepare($sql);
$statement->execute();
$books = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<?php require 'header.php';?>

<?php require 'search.php';?>

<?php require 'footer.php';?> 