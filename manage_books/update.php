<?php
$con = mysqli_connect("localhost", "root", "", "indenting", "3308");

if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

$isbn = isset($_GET['isbn']) ? $_GET['isbn'] : ''; // Get the ISBN number from the URL if it's set

if (!empty($isbn)) {
    // Retrieve book details based on ISBN number
    $query = "SELECT * FROM add_new_books WHERE isbn='$isbn'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Error: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("Book with ISBN Number '$isbn' not found.");
    }

    $book_name = $row['book_name'];
    $author = $row['author'];
    $edition = $row['edition'];
    $publisher = $row['publisher'];
    $year = $row['year'];
    $cost = $row['cost'];
    $field = $row['field'];
} else {
    // Handle the case where ISBN is not provided in the URL
    echo "ISBN number is missing in the URL.";
    // You can decide what action to take or display a message as needed.
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
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
    <button onclick="window.location.href='../adding_books.html'">Add New Books</button>
    <button onclick="window.location.href='update_books.php'" id="update-user-btn">Update Books</button>
    <button onclick="window.location.href='delete_books.php'">Delete Book</button>
    <button onclick="window.location.href='search_books.php'">Search Book</button>
  </div>
    <div id="form-left">
        <div id="navigation">
            <center>
                <form action="" method="POST">
                    <label for="book_name">BOOK NAME :</label>
                    <input type="text" id="book_name" name="book_name" size="50" placeholder="enter the book name" value="<?php echo $book_name; ?>" required><br>
                    <label for="author">AUTHOR :</label>
                    <input type="text" id="author" name="author" size="100" placeholder="author of book" value="<?php echo $author; ?>" required><br>
                    <label for="edition">EDITION :</label>
                    <input type="text" id="edition" name="edition" size="2" placeholder="enter the edition of book" value="<?php echo $edition; ?>" required><br>
                    <label for="isbn">ISBN NUMBER :</label>
                    <input type="text" id="isbn" size="20" name="isbn" value="<?php echo $isbn; ?>" readonly><br>
                    <label for="publisher">PUBLISHER :</label>
                    <input type="text" id="publisher" name="publisher" size="50" placeholder="publisher name" value="<?php echo $publisher; ?>" required><br>
                    <label for="year">YEAR OF PUBLICATION :</label>
                    <input type="number" id="year" name="year" pattern="\d{4}" placeholder="enter year of publication" value="<?php echo $year; ?>" required><br>
                    <label for="cost">COST OF BOOK :</label>
                    <input type="number" id="cost" size="30" name="cost" placeholder="enter the cost of book" value="<?php echo $cost; ?>" required><br>
                    <label for="field">FIELD OF BOOK:</label>
                    <input type="text" id="field" name="field" size="30" placeholder="enter the field of book" value="<?php echo $field; ?>" required><br>
                    <div id="button">
                        <input type="submit" value="Update" name="submit">
                    </div>
                </form>
            </center>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $newBookname = $_POST['book_name'];
    $newAuthor = $_POST['author'];
    $newEdition = $_POST['edition'];
    $newPublisher = $_POST['publisher'];
    $newYear = $_POST['year'];
    $newCost = $_POST['cost'];
    $newField = $_POST['field'];

    // Check if the values are different before attempting an update
    if ($newBookname !== $book_name || $newAuthor !== $author || $newEdition !== $edition || $newPublisher !== $publisher || $newYear !== $year || $newCost !== $cost || $newField !== $field) {
        $query = "UPDATE add_new_books SET book_name='$newBookname', author='$newAuthor', edition='$newEdition', publisher='$newPublisher', year='$newYear', cost='$newCost', field='$newField' WHERE isbn='$isbn'";
        $data = mysqli_query($con, $query);

        if ($data) {
            echo "<script>alert('Record Updated Successfully')</script>";
            echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/manage_books/update_books.php">';
        } else {
            echo "Failed to Update Record: " . mysqli_error($con);
        }
    } else {
        echo "No changes detected in the data. Nothing to update.";
    }
}
?>
