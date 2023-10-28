<?php

if (isset($_GET['journalName'], $_GET['journalNumber'], $_GET['publisher'], $_GET['year'], $_GET['field'])) {
    $journalName = $_GET['journalName'];
    $journalNumber = $_GET['journalNumber'];
    $publisher = $_GET['publisher'];
    $year = $_GET['year'];
    $field = $_GET['field'];

    // Database connection
    $conn = new mysqli('127.0.0.1:3308', 'root', '', 'indenting');

    // Prepare and execute the SQL insert query
    $stmt = $conn->prepare("INSERT INTO suggested_journals (journalName, journalNumber, publisher, year, field) VALUES (?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die('Connection Failed: ' . $conn->error);
    }

    $stmt->bind_param("sisis", $journalName, $journalNumber, $publisher, $year, $field);

    if ($stmt->execute()) {
        echo "<script>alert('Suggested new journals successfully')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/faculty/delete.php">
        <?php
    }else {
        echo "Error inserting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Missing data";
}

?>
