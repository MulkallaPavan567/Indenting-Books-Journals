
<!--<!DOCTYPE html>
<head>
    <title>Adding New Books Details</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <style>
    #navigation
    {
        background-color:lightgreen;
        border: solid lightcoral;
        padding-top: 20px;
        padding-left: 20px;
        padding-bottom: 250px;
    }
    </style>   
</head>
<body>
    <div id="header">
    <h1>Library Books / Journals Indenting System </h1>
        <img src="uoh.jpg" alt="University of Hyderabad">
        </div>
        <div id="section" align="left" class="btn-group1">
            <button onclick="window.location.href='new_user.html'">Create New User</button>
            <button onclick="window.location.href='update_user.php'">Manage Users</button>
            <button onclick="window.location.href='edit_profile.php'">Edit Profile</button>
            <button onclick="window.location.href='adding_books.html'">Add Books</button>
            <button onclick="window.location.href='managing_books.html'">Manage Books</button>
            <button onclick="window.location.href='adding_journals.html'">Add Journals</button>
            <button onclick="window.location.href='managing_journals.html'">Manage Journals</button>
            <button onclick="window.location.href='approve.html'">Approve</button>
        </div>
        <div id="navigation">-->
    
<?php
   $book_name = $_POST['book_name'];
   $author = $_POST['author'];
   $edition = $_POST['edition'];
   $isbn = $_POST['isbn'];
   $publisher = $_POST['publisher'];
   $year = $_POST['year'];
   $cost = $_POST['cost'];
   $field = $_POST['field'];
   

   //database connection
   $conn = new mysqli('127.0.0.1:3308', 'root', '', 'indenting');
   //prepare inserting the queries into the table
   $stmt = $conn->prepare("insert into add_new_books(book_name, author, edition, isbn, publisher, year, cost, field) values(?,?,?,?,?,?,?,?)");
   if(!$stmt){
        die('Connection Failed : '.$conn->error);
   }
    
    //bind the ? with proper datatype
    $stmt->bind_param("sssssiis",$book_name, $author, $edition, $isbn, $publisher, $year, $cost, $field);
    if($stmt->execute()){
        echo "<script>alert('Added new books successful')</script>";
    ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/manage_users/index2.php">
    <?php
    }else{
        echo "Error inserting record: " . $stmt->error;
    }
    $stmt->close();   //closing
    $conn->close();   //closing connection
   
?>
<!--</div>
</body>
</html>-->
