<!DOCTYPE html>

<head>
    <title>Booking_Details</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <style>
        #navigation {
            background-color: lightgreen;
            border: solid lightcoral;
            padding-top: 20px;
            padding-left: 20px;
            padding-bottom: 250px;
        }
    </style>
</head>

<body>
    <header>
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
    </header>

    <div id="section" class="btn-group1">
        <!-- Your button links here -->
        <button onclick="window.location.href='create.html'" id="create-user-btn">Create New User</button>
        <button onclick="window.location.href='update_user.php'">Manage Users</button>
        <button onclick="window.location.href='edit_profile.html'">Edit Profile</button>
        <button onclick="window.location.href='adding_books.html'">Add Books</button>
        <button onclick="window.location.href='managing_books.html'">Manage Books</button>
        <button onclick="window.location.href='adding_journals.html'">Add Journals</button>
        <button onclick="window.location.href='managing_journals.html'">Manage Journals</button>
        <button onclick="window.location.href='approve.html'">Approve</button>
        <button onclick="window.location.href='admin1.php'">Logout</button>
    </div>
    <div id="navigation">

        <?php
        $fname = $_POST['fname'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //database connection
        $conn = new mysqli('127.0.0.1:3308', 'root', '', 'indenting');
        //prepare inserting the queries into the table
        $stmt = $conn->prepare("insert into create_new_user(fname, username, password) values(?,?,?)");
        if (!$stmt) {
            die('Connection Failed : ' . $conn->error);
        }

        //bind the ? with proper datatype
        $stmt->bind_param("sss", $fname, $username, $password);
        if ($stmt->execute()) {
            echo "<script>alert('Added new user successfully')</script>";
        ?>
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/data/index2.php">
        <?php
        } else {
            echo "Error inserting record: " . $stmt->error;
        }
        $stmt->close();   //closing
        $conn->close();   //closing connection

        ?>
    </div>
</body>

</html>