<!DOCTYPE html>
<head>
    <title>Booking_Details</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <style>
        #navigation
        {
            background-color: lightgreen;
            border: solid lightcoral;
            padding-top: 20px;
            padding-bottom: 250px;
            padding-left: 10px;
        }
    </style>
</head>
<body>
<div id="header">
    <h1>Library Books / Journals Indenting System </h1>
    <img src="uoh.jpg" alt="University of Hyderabad">
</div>
<div id="section" align="left" class="btn-group1">
    <button onclick="window.location.href='update_user.php'">Update Users</button>
    <button onclick="window.location.href='delete_user.php'">Delete Users</button>
    <button onclick="window.location.href='search_user.php'">Search Users</button>
</div>
<div id="navigation">
    <h1><u>Delete the Faculty Users</u></h1>
    <form method="POST" action="">
        <center>
            <label for="username"><b> USERNAME : </b></label>
            <input type="text" name="search" placeholder="enter your email as username" size="30" required><br><br>
            <input type="submit" value="delete"></center>
    </form>

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['search'];

    // Connect to the database
    $conn = new mysqli("127.0.0.1:3308", "root", "", "indenting");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete data from the database by using username
    $sql = "DELETE FROM create_new_user WHERE username = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result !== false && mysqli_affected_rows($conn) > 0) {
        echo "<b>Data deleted from database successfully</b>";
    } else {
        echo "<b>No faculty found with this username</b>";
    }

    mysqli_close($conn);
}


    ?>

</div>
</body>
</html>
