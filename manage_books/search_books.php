<!DOCTYPE html>

<head>
  <title>Booking_Details</title>
  <link rel="stylesheet" href="../style.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
  <style>
    
  </style>
</head>

<body>
<header>
    <div id="header">
      <div id="img_left">
        <img src="../img/uoh_logo_white.png" alt="University of Hyderabad">
      </div>
      <div id="title">
        <h1>School of Computer and Information Sciences</h1>
        <h2>Library Books / Journals Indenting System</h2>
      </div>
      <div id="img_right">
        <img src="../img/uoh_ioe_white.png" alt="University of Hyderabad">
      </div>
    </div>
  </header>

  <div id="section" class="btn-group1">
    <!-- Your button links here -->
    <button onclick="window.location.href='../manage_books/adding_books.html'">Add New Books</button>
    <button onclick="window.location.href='update_books.php'" id="update-user-btn">Update Books</button>
    <button onclick="window.location.href='delete_books.php'">Delete Book</button>
    <button onclick="window.location.href='search_books.php'">Search Book</button>
    <button onclick="window.location.href='../admin1.php'">Logout</button>
  </div>
  <div id="navigation">
    <h1><u>Search the Faculty Users</u> </h1>
    <form method="POST" action="">
      <center>
        <label for="isbn"><b> ISBN Number : </b></label>
        <input type="text" name="search" placeholder="Enter the Book ISBN Number" size="30" required><br><br>
        <input type="submit" value="search">
      </center>
    </form>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //Retrieve form data
      $id = $_POST['search'];

      //Connect to the database
      $conn = new mysqli("127.0.0.1:3308", "root", "", "indenting");

      //Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      //Retrieve data from the database by using id
      $sql = "SELECT * FROM add_new_books WHERE isbn = '$id'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        //output data of each row
        while ($row = mysqli_fetch_assoc($result))   //to fetch a single row from the result set returned by MySQL database query
        {
          //echo "<div style='background-color: lightgreen; padding: 10px; border: solid lightcoral;'>";
          echo " <p style='font-weight: bold; font-size:38px; padding:50px' > 
            Book Name : " . $row["book_name"] . "<br>";
          echo "Author  : " . $row["author"] . "<br>";
          echo "Edition  : " . $row["edition"] . "<br>";
          echo "ISBN  : " . $row["isbn"] . "<br>";
          echo "Publisher  : " . $row["publisher"] . "<br>";
          echo "Year  : " . $row["year"] . "<br>";
          echo "Cost  : " . $row["cost"] . "<br>";
          echo "Field  : " . $row["field"] . "<br>";          
          echo "</p>";
          echo "</div>";
        }
      } else {
        echo "No books found with the given ISBN Number";
      }

      mysqli_close($conn);
    }

    ?>

  </div>
</body>

</html>