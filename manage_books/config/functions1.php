<?php 

  require_once 'db1.php';

  function display_data(){
    global $con;
    $query = "select * from add_new_books";
    $data = mysqli_query($con,$query);
    return $data;
  }

?>