<?php
// Configuration
$host = "localhost";
$port = 3308;
$user = "root";
$password = "";
$db = "indenting";
$table = "users";

// Connect to MySQL
$link = mysqli_connect($host, $user, $password, $db, $port);
if (!$link) {
    die("Could not connect: " . mysqli_connect_error());
}

// Check if login form is submitted
if (isset($_POST['login'])) {
    // Retrieve the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate email format for username
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid username format. Please enter a valid email address.";
    } else {
        // Validate password requirements
        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $number = preg_match('/\d/', $password);
        $symbol = preg_match('/[^A-Za-z0-9]/', $password);

        if (!$uppercase || !$lowercase || !$number || !$symbol) {
            $error = "Invalid password. Password must contain at least one uppercase letter, one lowercase letter, one symbol, and one number.";
        } else {
            // Fetch user record from the database
            $query = "SELECT * FROM $table WHERE username = '$username'";
            $result = mysqli_query($link, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                // Verify the entered password against the stored password
                if ($password === $user['password']) {
                    // Redirect to the home page or any other desired page
                    header('Location: new_user.html');
                    exit();
                }
            }

            // Invalid credentials
            $error = "Invalid credentials. Please try again.";
        }
    }
}

// Close the database connection
mysqli_close($link);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        #header {
            background-color: #003366;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        #header h1 {
            margin: 0;
        }

        #img {
            width: 100%;
            max-height: 100vh; /* Limit the height to the viewport height */
            overflow: hidden; /* Hide any overflow if the image is too tall */
        }

        #img img {
            width: 100%;
            height: 150px;
        }


        #section {
            text-align: center;
            padding: 20px 0;
        }

        .btn-group1 {
            display: flex;
            justify-content: center;
        }

        .btn-group1 button {
            background-color: #003366;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-group1 button:hover {
            background-color: #6a819c;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
            
        
        }


        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold; /* Adding bold font to labels for emphasis */
        }

        input[type="text"],
        input[type="password"] {
            /* ... (other styles) ... */
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 12px;
        }

        input[type="submit"] {
            background-color: #003366;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            width: 90%;
        }

        input[type="submit"]:hover {
            background-color: #002855;
        }

        .error-message {
            color: #ff0000;
            margin-top: 10px;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>Library Books / Journals Indenting System</h1>
    </div>
    <div id="img">
        <img src="scis.png" alt="University of Hyderabad">
    </div>
    <div id="section" class="btn-group1">
        <button onclick="window.location.href='login.php'">Admin Login</button>
        <button onclick="window.location.href='faculty.php'">Faculty Login</button>
    </div>
    <div id="navigation">
        <div class="container">
            <h2><b>Admin Login</b></h2>
            <br><br>
            <?php if (isset($error)) : ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php endif; ?>
    
            <form method="POST" action="">
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Enter your email as username" required>
    
                <label for="password">Password:</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <span id="password-toggle" class="password-toggle" onclick="togglePasswordVisibility()">
                        <img src="eye-slash.svg" alt="Toggle Password Visibility">
                    </span>
                </div>
                <br><br>
    
                <center><input type="submit" name="login" value="Admin Login"></center>
            </form>
        </div>
    
        <script>
            function togglePasswordVisibility() {
                var passwordInput = document.getElementById("password");
                var passwordToggle = document.getElementById("password-toggle");
    
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    passwordToggle.innerHTML = '<img src="eye.svg" alt="Toggle Password Visibility">';
                } else {
                    passwordInput.type = "password";
                    passwordToggle.innerHTML = '<img src="eye-slash.svg" alt="Toggle Password Visibility">';
                }
            }
        </script>
</body>
</html>
