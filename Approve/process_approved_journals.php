<?php
require_once 'config/db1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approved_journals'])) {
    $suggestedJournals = json_decode($_POST['approved_journals'], true);

    if (is_array($suggestedJournals) && !empty($suggestedJournals)) {
        $insertedCount = 0;

        foreach ($suggestedJournals as $journalData) {
            $journalName = mysqli_real_escape_string($con, $journalData['journalName']);
            $journalNumber = mysqli_real_escape_string($con, $journalData['journalNumber']);
            $publisher = mysqli_real_escape_string($con, $journalData['publisher']);
            $year = mysqli_real_escape_string($con, $journalData['year']);
            $field = mysqli_real_escape_string($con, $journalData['field']);

            $insertQuery = "INSERT INTO approved_journals (journalName, journalNumber, publisher, year, field) 
                            VALUES ('$journalName', '$journalNumber', '$publisher', '$year', '$field')";

            $result = mysqli_query($con, $insertQuery);

            if ($result) {
                $insertedCount++;
            } else {
                // Handle insertion errors
                echo "Error inserting journal: " . mysqli_error($con);
            }
        }

        if ($insertedCount > 0) {
            echo "Successfully approved $insertedCount journal(s).";
            // Redirect to select_journal.php after a brief delay (0 seconds)
            //echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/indent/faculty/select_journal.php">';
        } else {
            echo "No journals were suggested.";
        }
    } else {
        echo "No valid journals selected for suggestion.";
    }
} else {
    echo "Invalid request. Please submit the form data.";
}

mysqli_close($con);
?>
