<?php
   $servername = "sql302.byethost33.com";
   $username   = "b33_42644196";
   $password   = "verti_plant_123";
   $db         = "b33_42644196_VERTIPLANT";

   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $db);

   // Check connection
   if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }
   //echo "Connected successfully";
?>