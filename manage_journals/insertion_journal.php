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
                $journalName = $data[0];
                $journalNumber = $data[1];
                $publisher = $data[2];
                $year = $data[3];
                $field = $data[4];
                
                // Insert data into the "journals" table
                $sql = "INSERT INTO journals (journalName, journalNumber, publisher, year, field) VALUES ('$journalName', '$journalNumber', '$publisher', '$year', '$field')";
                if ($conn->query($sql) != true) {
                    $success = false;
                    break; // Exit the loop on the first error
                }
            }
            fclose($handle);
        }

        if ($success) {
            echo "<script>alert('Added new journals successfully')</script>";
            ?>
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/manage_journals/delete_journals.php">
            <?php
        } else {
            echo "<script>alert('Error: Unable to add all journals')</script>";
        }
    }
    
    $conn->close();
}
?>
