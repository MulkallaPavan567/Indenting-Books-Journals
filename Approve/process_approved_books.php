<?php
// Include your database configuration here
require_once 'config/db1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approved_books'])) {
    // Retrieve the selected books data sent from the front-end
    $selectedBooks = json_decode($_POST['approved_books'], true);

    if (is_array($selectedBooks) && !empty($selectedBooks)) {
        $insertedCount = 0;

        // Loop through the selected books and insert them into the 'approved_books' table
        foreach ($selectedBooks as $book) {
            $bookName = mysqli_real_escape_string($con, $book['book_name']);
            $author = mysqli_real_escape_string($con, $book['author']);
            $edition = mysqli_real_escape_string($con, $book['edition']);
            $isbn = mysqli_real_escape_string($con, $book['isbn']);
            $publisher = mysqli_real_escape_string($con, $book['publisher']);
            $year = mysqli_real_escape_string($con, $book['year']);
            $cost = mysqli_real_escape_string($con, $book['cost']);
            $field = mysqli_real_escape_string($con, $book['field']);

            // Insert the book data into the 'approved_books' table
            $insertQuery = "INSERT INTO approved_books (book_name, author, edition, isbn, publisher, year, cost, field) 
                            VALUES ('$bookName', '$author', '$edition', '$isbn', '$publisher', '$year', '$cost', '$field')";

            $result = mysqli_query($con, $insertQuery);

            if ($result) {
                $insertedCount++;
            } else {
                // Handle insertion errors
                echo "Error inserting book: " . mysqli_error($con);
            }
        }

        // Check if any books were successfully inserted
        if ($insertedCount > 0) {
            echo "Successfully approved $insertedCount book(s).";
        } else {
            echo "No books were suggested.";
        }
    } else {
        echo "No valid books selected for suggestion.";
    }
} else {
    echo "Invalid request. Please submit the form data.";
}

// Close the database connection
mysqli_close($con);
?>




<?php
// Include your database connection code here if not already included

/*if (isset($_POST['suggested_books']) && !empty($_POST['suggested_books'])) {
    $suggestedBooks = $_POST['suggested_books'];

    // Loop through the selected books and insert them into the suggested_books table
    foreach ($suggestedBooks as $book) {
        // Extract book data from JSON
        $bookData = json_decode($book, true);

        // Insert data into the suggested_books table (modify this query based on your table structure)
        $insertQuery = "INSERT INTO suggested_books (book_name, author, edition, isbn, publisher, year, cost, field) VALUES (
            '" . mysqli_real_escape_string($con, $bookData['book_name']) . "',
            '" . mysqli_real_escape_string($con, $bookData['author']) . "',
            '" . mysqli_real_escape_string($con, $bookData['edition']) . "',
            '" . mysqli_real_escape_string($con, $bookData['isbn']) . "',
            '" . mysqli_real_escape_string($con, $bookData['publisher']) . "',
            '" . mysqli_real_escape_string($con, $bookData['year']) . "',
            '" . mysqli_real_escape_string($con, $bookData['cost']) . "',
            '" . mysqli_real_escape_string($con, $bookData['field']) . "'
        )";

        // Execute the query
        if (mysqli_query($con, $insertQuery)) {
            // The book has been successfully suggested
            echo "Suggested: " . $bookData['book_name'] . "<br>";
        } else {
            // Handle any errors that may occur during insertion
            echo "Error suggesting: " . mysqli_error($con) . "<br>";
        }
    }
} else {
    echo "No books selected for suggestion.";
}
*/?>
