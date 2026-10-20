<?php require 'conn.php';?>
<html>
  <head>
    <style>
     body
     {
       background: yellow;
       color:red;
     }
    </style>
  </head>
  <body>
    <select>
      <option>BSIT</option>
      <option>BSCS</option>
      <option>BSHM</option>
    </select>
    <button> Search </button>
    
    
    <table class="" border="5">
      <tr>
        <th>ID        </th>
        <th>First Name</th>
        <th>Last Name </th> 
        <th>Course    </th>
        <th>Section   </th>
        <th>Action   </th>
      </tr>
      <?php
       $sql    = 'SELECT * FROM students';
       $result = $conn->query($sql);
       if($result)
       {
          if($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
              $ID      = $row['ID'];
              $fname   = $row['FirstName'];
              $lname   = $row['LastName'];
              $course  = $row['Course'];
              $section = $row['Section'];
              ?>
              <tr>
                <td>  <?php  echo $ID;     ?>  </td>
                <td>  <?php  echo $fname;  ?>  </td>
                <td>  <?php  echo $lname;  ?>  </td>
                <td>  <?php  echo $course; ?>  </td>
                <td>  <?php  echo $section;?>  </td>
                <td>  <a href="deleteStudent.php?idToBeDelete=<?php echo $ID;  ?>">delete</a>    </td>
              
              </tr>
              
              <?php
           
            }
          }
       }
      
      ?>
    </table>
    <form method="POST" action="insertStudent.php">
        <input type="text" name="firstname" placeholder="First Name"/>
        <input type="text" name="lastname" placeholder="Last Name"/>
        <select name="course">
            <option>BSIT</option>
            <option>BSCS</option>
            <option>BSHM</option>
        </select>
        <input type="text" name="section" placeholder="e.g. 2C"/>
        <input type="submit" value="Save"/>
    </form>
  </body>
</html>