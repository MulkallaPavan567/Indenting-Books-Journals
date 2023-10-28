
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $accountNumber = $_POST['accountNumber'];
    $amount = $_POST['amount'];

    // Database connection
    $conn = new mysqli('127.0.0.1:3308', 'root', '', 'bank');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Update deposit amount and date
    $sql1 = "UPDATE deposit SET amount=(amount+$amount), date=? WHERE accountNumber=?";
    $stmt1 = $conn->prepare($sql1);
    if ($stmt1) {
        $stmt1->bind_param("si", $date, $accountNumber);
        if ($stmt1->execute()) {
            echo "<script>alert('Deposit is Successful!');</script>";
        } else {
            echo "<script>alert('Error depositing amount: " . $stmt1->error . "');</script>";
        }
        $stmt1->close();
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    $conn->close();   // Closing connection
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Form</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <style>
        /* Add your custom styling here */
    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    .card {
        border: none;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-radius: 0;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 0;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 0;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .input-group-text {
        border-radius: 0;
    }
    /* Additional styling as needed */

    </style>
</head>
<body>
<div class="container mt-5">
        <h2>Deposit Form</h2>
        <form method="POST" action="">
        <!--<form id="depositForm">-->
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <!--<div class="form-group">
                <label for="accountHolder">Account Holder Name</label>
                <input type="text" class="form-control" id="accountHolder" name="accountHolder" required>
            </div>-->
            <div class="form-group">
                <label for="accountNumber">Account Number</label>
                <input type="number" class="form-control" id="accountNumber" name="accountNumber" required>
            </div>
            <!--<div class="form-group">
                <label for="ifsc">IFSC</label>
                <input type="text" class="form-control" id="ifsc" name="ifsc" required>
            </div>-->
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Deposit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    
    </div>
</body>
</html>

