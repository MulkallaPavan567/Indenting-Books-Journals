<?php
$con = mysqli_connect("localhost", "root", "", "indenting", "3308");

if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

$fname = $_GET['fname'];
$username = $_GET['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <div id="header">
        <div id="img_left">
            <img src="uoh_logo_white.png" alt="University of Hyderabad">
        </div>
        <div id="title">
            <h1>School of Computer and Information Sciences</h1>
            <h2>Library Books / Journals Indenting System</h2>
        </div>
        <div id="img_right">
            <img src="uoh_ioe_white.png" alt="University of Hyderabad">
        </div>
    </div>
    <div id="section" align="left" class="btn-group1">
        <button onclick="window.location.href='index3.php'">Update Users</button>
        <button onclick="window.location.href='index2.php'">Delete Users</button>
        <button onclick="window.location.href='search_user.php'">Search Users</button>
        <button onclick="window.location.href='admin1.php'">Logout</button>
    </div>
    <div id="form-left">
        <div id="navigation">
            <center>
                <form action="" method="POST">
                    <label for="fname">FULL NAME :</label>
                    <input type="text" id="fname" min="3" max="30" name="fname" size="30" value="<?php echo "$fname" ?>" required><br>
                    <label for="username">USER NAME :</label>
                    <input type="text" id="username" name="username" size="30" value="<?php echo "$username" ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required><br>
                    <div id="button">
                        <input type="submit" value="update" name="submit">
                    </div>
                </form>
            </center>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $newFname = $_POST['fname'];
    $newUsername = $_POST['username'];

    // Check if the values are different before attempting an update
    $query = "SELECT * FROM create_new_user WHERE username='$newUsername'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($con);
    } else {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $currentFname = $row['fname'];

            if ($newFname !== $currentFname) {
                $query = "UPDATE create_new_user SET fname='$newFname',username='$newUsername' WHERE username='$newUsername'";
                $data = mysqli_query($con, $query);

                if ($data) {
                    echo "<script>alert('Record Updated Successfully')</script>";
                    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/manage_users/index3.php">';
                } else {
                    echo "Failed to Update Record: " . mysqli_error($con);
                }
            } else {
                echo "No changes detected in the data. Nothing to update.";
            }
        } else {
            echo "User with username '$newUsername' not found.";
        }
    }
}
?>
