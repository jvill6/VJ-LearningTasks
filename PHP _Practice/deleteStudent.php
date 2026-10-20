<?php
require 'conn.php';

$data = $_GET;
var_dump($data);
$sql= "DELETE FROM students WHERE ID = ".$data['idToBeDelete'];
echo $sql;
$result = $conn->query($sql);
header('Location:index.php');




?>