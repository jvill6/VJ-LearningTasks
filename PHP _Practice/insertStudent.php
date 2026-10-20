<?php
require 'conn.php';

$data = $_POST;
var_dump($data);

$sql = "INSERT INTO students 
        (FirstName,LastName,Course,Section)
        VALUES(
                '".$data['firstname']."',
                '".$data['lastname' ]."',
                '".$data['course'   ]."',
                '".$data['section'  ]."'
        
              )
        ";
echo $sql;
$result = $conn->query($sql);
header('Location:index.php');
?>