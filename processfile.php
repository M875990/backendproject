<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "Madhu@123";
$dbname = "social_connection";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function displayUserUpdate($user_id) {
    global $conn;

    // Fetch updates from the database for the current user
    $sql = "SELECT post_text FROM posts_table WHERE post_id = $user_id ORDER BY timestamp DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $update_text = $row['updatetext'];
        return "<label>Update from User $user_id</label><br><input type='text' value='$updatetext' readonly><br><br>";
    } else {
        return "No updates available.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatetext"])) {
    // Handle the posted update
    $updateText = $_POST["updatetext"];
    $userId = $_POST["user_id"];

    // Insert the update into the database (replace with your actual logic)
    $insertSql = "INSERT INTO posts_table (id, post_text) VALUES ('$userId', '$updateText')";
    if ($conn->query($insertSql) === TRUE) {
        echo "Update posted successfully";
    } else {
        echo "Error posting update: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
