<?php

if (isset($_GET['book_name'], $_GET['author'], $_GET['edition'], $_GET['isbnnum'], $_GET['publisher'], $_GET['year'], $_GET['cost'], $_GET['field'])) {
    $book_name = $_GET['book_name'];
    $author = $_GET['author'];
    $edition = $_GET['edition'];
    $isbn = $_GET['isbnnum'];
    $publisher = $_GET['publisher'];
    $year = $_GET['year'];
    $cost = $_GET['cost'];
    $field = $_GET['field'];

    // Database connection
    $conn = new mysqli('127.0.0.1:3308', 'root', '', 'indenting');

    // Prepare and execute the SQL insert query
    $stmt = $conn->prepare("INSERT INTO suggested_books (book_name, author, edition, isbn, publisher, year, cost, field) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die('Connection Failed: ' . $conn->error);
    }

    $stmt->bind_param("ssssssis", $book_name, $author, $edition, $isbn, $publisher, $year, $cost, $field);

    if ($stmt->execute()) {
        echo "<script>alert('Suggested new book successfully')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/faculty/delete_books.php">
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
