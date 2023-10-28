<?php
$con = mysqli_connect("localhost", "root", "", "indenting", "3308");

if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

$journalNumber = isset($_GET['journalNumber']) ? $_GET['journalNumber'] : '';

if (!empty($journalNumber)) { // Changed $JournalNumber to $journalNumber
    // Retrieve journal details based on journalNumber
    $query = "SELECT * FROM journals WHERE journalNumber='$journalNumber'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Error: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("Journal with Journal Number '$journalNumber' not found."); // Changed $JournalNumber to $journalNumber
    }

    $journalName = $row['journalName'];
    $publisher = $row['publisher'];
    $year = $row['year'];
    $field = $row['field'];
} else {
    // Handle the case where journalNumber is not provided in the URL
    echo "Journal number is missing in the URL.";
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
        <button onclick="window.location.href='../adding_journals.html'">Add New Journals</button>
        <button onclick="window.location.href='update_journals.php'" id="update-user-btn">Update Journals</button>
        <button onclick="window.location.href='delete_journals.php'">Delete Journals</button>
        <button onclick="window.location.href='search_journals.php'">Search Journals</button>
    </div>
    <div id="form-left">
        <div id="section">
            <center>
                <form action="" method="POST">
                    <label for="journalName">JOURNAL NAME :</label>
                    <input type="text" id="journalName" name="journalName" size="50" placeholder="enter the book name" value="<?php echo $journalName; ?>" required><br>
                    <label for="journalNumber">JOURNAL NUMBER :</label>
                    <input type="text" id="journalNumber" name="journalNumber" size="100" placeholder="author of book" value="<?php echo $journalNumber; ?>" required><br>
                    <label for="publisher">PUBLISHER :</label>
                    <input type="text" id="publisher" name="publisher" size="50" placeholder="publisher name" value="<?php echo $publisher; ?>" required><br>
                    <label for="year">YEAR OF PUBLICATION :</label>
                    <input type="number" id="year" name="year" pattern="\d{4}" placeholder="enter year of publication" value="<?php echo $year; ?>" required><br>
                    <label for="field">FIELD OF JOURNAL:</label>
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
    $newJournalName = $_POST['journalName'];
    $newPublisher = $_POST['publisher'];
    $newYear = $_POST['year'];
    $newField = $_POST['field'];

    // Check if the values are different before attempting an update
    if ($newJournalName !== $journalName || $newPublisher !== $publisher || $newYear !== $year || $newField !== $field) {
        $query = "UPDATE journals SET journalName='$newJournalName', publisher='$newPublisher', year='$newYear', field='$newField' WHERE journalNumber='$journalNumber'";
        $data = mysqli_query($con, $query);

        if ($data) {
            echo "<script>alert('Record Updated Successfully')</script>";
            ?>
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/manage_journals/update_journals.php">
            <?php
        } else {
            echo "Failed to Update Record: " . mysqli_error($con);
        }
    } else {
        echo "No changes detected in the data. Nothing to update.";
    }
}
?>