<?php    
//include("config/db1.php");
//error_reporting(0);
require_once 'config/db1.php';
$username = $_GET['un'];
$query = "DELETE FROM create_new_user WHERE USERNAME='$username'";
$data = mysqli_query($con, $query);
if($data)
{
  echo "<script>alert('Record Deleted from Database')</script>";
  ?>
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/manage_users/index2.php">
  <?php
}   
else
{
  echo "<script>alert('Failed to Delete data from Database')</script>";
}
?>