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

// Check if the request is for registration
if (isset($_POST['signupEmail']) && isset($_POST['signupUsername']) && isset($_POST['signupPassword'])) {
    $email = $_POST['signupEmail'];
    $username = $_POST['signupUsername'];
    $password = password_hash($_POST['signupPassword'], PASSWORD_BCRYPT);

    // Check if the user already exists
    $checkUserQuery = "SELECT * FROM users WHERE email='$email' OR username='$username'";
    $checkUserResult = $conn->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        echo "exists";
    } else {
        // Insert new user into the database
        $insertUserQuery = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

        if ($conn->query($insertUserQuery) === TRUE) {
            echo "success";
        } else {
            echo "error";
        }
    }
}

if (isset($_POST['loginUsername']) && isset($_POST['loginPassword'])) {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    // Retrieve user from the database
    $getUserQuery = "SELECT * FROM users WHERE username='$username'";
    $getUserResult = $conn->query($getUserQuery);

    if ($getUserResult->num_rows > 0) {
        $user = $getUserResult->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
}

$conn->close();
?>
