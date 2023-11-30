<?php
$servername = "localhost";
$username = "root";
$password = "Madhu@123";
$dbname = "social_connection";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: profile.php");
    exit();
}

// Fetch user details from the database
$userID = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$userID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, display the details
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    // Add more user details as needed
} else {
    // User not found, redirect to login page
    header("Location: index.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: rgb(183, 233, 183);
        }

        header {
            background-color: grey;
            color: #fff;
            padding: 10px;
            text-align: right;
            margin-top: -20px;
            margin-bottom: 20px;
            margin-left: -20px;
            margin-right: -20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        #profile-container {
            max-width: 600px;
            margin: 0 auto;
        }

        #user-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        #friends {
            background-color: lightgray;
            color: black;
            margin-left: 20px;
        }

        #logout {
            background-color: lightgray;
            color: black;
            margin-left: 30px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<header>
    <a href="friends-page.php" id="friends" class="btn btn-secondary">Back to Friends</a>

    <!-- Logout Button -->
    <a href="index.php"><button type="button" id="logout" class="btn btn-secondary" onclick="logout()">Logout</button></a>
</header>

<div id="profile-container">

    <div id="user-info">
        <h2>User Profile</h2>
        <p><strong>User Name:</strong> <?php echo $username; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
        <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
        <!-- Add more user details as needed -->
    </div>

</div>

<script>
    function logout() {
        localStorage.removeItem('userToken');
        window.location.href = 'index.php';
    }
</script>

</body>
</html>
