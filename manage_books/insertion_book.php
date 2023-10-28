<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli('127.0.0.1:3308', 'root', '', 'indenting');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $success = true; // Track if all insertions are successful

    // Process the uploaded CSV file
    if (isset($_FILES["csvfile"]) && $_FILES["csvfile"]["error"] == 0) {
        $file = $_FILES["csvfile"]["tmp_name"];
        
        // Read CSV file
        if (($handle = fopen($file, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $book_name = $data[0];
                $author = $data[1];
                $edition = $data[2];
                $isbn = $data[3];
                $publisher = $data[4];
                $year = $data[5];
                $cost = $data[6];
                $field = $data[7];
                
                // Insert data into the "add_new_books" table
                $sql = "INSERT INTO add_new_books (book_name, author, edition, isbn, publisher, year, cost, field) VALUES ('$book_name', '$author', '$edition', '$isbn', '$publisher', '$year', '$cost', '$field')";
                if ($conn->query($sql) !== true) {
                    $success = false; // Set to false on the first error
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    break; // Exit the loop on error
                }
            }
            fclose($handle);
        }

        if ($success) {
            echo "<script>alert('Data added to database successfully')</script>" . "<br>";
            ?>
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/manage_books/delete_books.php">
            <?php
        }
    }
    
    $conn->close();
}
?>
