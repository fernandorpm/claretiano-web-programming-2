<?php
  $servername = "localhost";
  $db_user = "root";
  $db_password = "rootpassword";
  $db_name = "claretiano";
  $connection = mysqli_connect($servername, $db_user, $db_password);
  
  mysqli_select_db($connection, $db_name);

  if(!$connection)
  {
    die("Connection failed: " . mysqli_connect_error());
  }
?>