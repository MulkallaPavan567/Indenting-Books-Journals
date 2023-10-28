<?php 


/*require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query);
*/

require_once 'config/db1.php';
//require_once 'config/functions1.php';

//$data = display_data();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Fetch Data From Database in Php</title>
</head>
<body class="bg-dark">
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">Fetch Data From Database in Php</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <td> Full Name </td>
                  <td> Username / Email </td>
                  <td> Edit </td>
                  <td> Delete </td>
                </tr>
                <tr>
                <?php 
                
                  while($result = mysqli_fetch_assoc($data))
                  {
                ?>
                  <td><?php echo $result['fname']; ?></td>
                  <td><?php echo $result['username']; ?></td>
                  <td><a href="#" class="btn btn-primary">Edit</a></td>  
                  <td><a href='delete1.php?un=$result[username]' onclick='return checkdelete()' class="btn btn-danger">Delete</a></td>  
                </tr>
                <?php    
                  }
                
                ?>
                
              </table>
              <script>
                function checkdelete()
                {
                    return Confirm('Are you sure want to Delete this Record');
                }
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>