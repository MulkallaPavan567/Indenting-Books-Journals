<!DOCTYPE html>
<head>
    <title>Booking_Details</title>
    <link rel="stylesheet" href="audit.css">
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
        <h1>Auditorium Management Website</h1>
        <img src="uoh.jpg" alt="University of Hyderabad">
        </div>
        <div id="section" align="left" class="btn-group1">
            <button onclick="window.location.href='audit.html'">Home</button>
            <button onclick="window.location.href='Add_booking.php'">Add Booking</button>
            <button onclick="window.location.href='View_booking.html'">View Booking</button>
        </div>
        <div id="navigation">

<?php
   $Auditoriumname = $_POST['Auditoriumname'];
   $capacity = $_POST['capacity'];
   $booking_type = $_POST['booking_type'];
   $addrress = $_POST['addrress'];
   $booking_purpose = $_POST['booking_purpose'];

   //database connection
   $conn = new mysqli('127.0.0.1:3308', 'root', '', 'auditoriumbooking');
   if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
   }else{
    //prepare insert query into table  
    $stmt = $conn->prepare("insert into addvenue(Auditoriumname, capacity, booking_type, addrress, booking_purpose) values(?,?,?,?,?)");
    //bind the ? with proper datatype
    $stmt->bind_param("sisss",$Auditoriumname, $capacity, $booking_type, $addrress, $booking_purpose);
    $stmt->execute();
    echo "Added venue successfully";
    $stmt->close();   //closing revert statement
    $conn->close();  //closing connection
   }
?>
</div>
</body>
</html>