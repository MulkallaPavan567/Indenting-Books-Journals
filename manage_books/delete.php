<?php    
//include("config/db1.php");
//error_reporting(0);
require_once 'config/db1.php';
$isbn = $_GET['isbnnum'];
$query = "DELETE FROM add_new_books WHERE ISBN='$isbn'";
$data = mysqli_query($con, $query);
if($data)
{
  echo "<script>alert('Record Deleted from Database')</script>";
  ?>
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/manage_books/delete_books.php">
  <?php
}   
else
{
  echo "<script>alert('Failed to Delete data from Database')</script>";
}
?>