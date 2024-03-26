<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydatabase";

$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if ID parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement to delete record
    $sql = "DELETE FROM clients WHERE id=$id";

    // Execute SQL statement
    if ($connection->query($sql) === TRUE) {
        // Redirect back to index page after successful deletion
        header("Location: myindex.php");
        exit;
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    echo "Client ID not provided";
}

// Close connection
$connection->close();
?>
