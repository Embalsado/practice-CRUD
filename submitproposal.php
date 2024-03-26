<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Assuming no password is set
$database = "formdb";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firm = $_POST["firm"];
    $officeadd = $_POST["officeadd"];
    $farmadd = $_POST["farmadd"];
    $businessno = $_POST["businesscontact"];
    $emailadd = $_POST["emailadd"];
    $representative = $_POST["authrep"];
    $position = $_POST["position"];
    $address = $_POST["address"];
    $applicationtype = $_POST["application_type"];
    $projectType = $_POST["projectType"];

    // Retrieve file names
    $letterofintent = $_FILES["letterofintent"]["name"];
    $companyprofile = $_FILES["companyprofile"]["name"];
    $attachproposal = $_FILES["attachproposal"]["name"];

    // File upload directory
    $targetDir = "proposalUploads/";
    // Path for uploaded files
    $letterofintentPath = $targetDir . basename($letterofintent);
    $companyprofilePath = $targetDir . basename($companyprofile);
    $attachproposalPath = $targetDir . basename($attachproposal);

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO proposaldata (firm, officeadd, farmadd, businessno, emailadd, representative, position, address, typeofapp, projectprofile, letterofintent, companyprofile, attachproposal) 
            VALUES ('$firm', '$officeadd', '$farmadd', '$businessno', '$emailadd', '$representative', '$position', '$address', '$applicationtype', '$projectType', '$letterofintent', '$companyprofile', '$attachproposal')";

    // Check if the query executed successfully
    if ($connection->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    // Upload files to the server
    move_uploaded_file($_FILES["letterofintent"]["tmp_name"], $targetDir . $letterofintent);
    move_uploaded_file($_FILES["companyprofile"]["tmp_name"], $targetDir . $companyprofile);
    move_uploaded_file($_FILES["attachproposal"]["tmp_name"], $targetDir . $attachproposal);
}

// Close connection
$connection->close();
