<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "formdb";

$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    // File names, not file contents
    $letterofintent = $_FILES["letterofintent"]["name"];
    $companyprofile = $_FILES["companyprofile"]["name"];
    $attachproposal = $_FILES["attachproposal"]["name"];

    // Move uploaded files to a designated directory
    $targetDir = "proposalUploads/";
    $targetFile1 = $targetDir . basename($_FILES["letterofintent"]["name"]);
    $targetFile2 = $targetDir . basename($_FILES["companyprofile"]["name"]);
    $targetFile3 = $targetDir . basename($_FILES["attachproposal"]["name"]);

    if (
        move_uploaded_file($_FILES["letterofintent"]["tmp_name"], $targetFile1) &&
        move_uploaded_file($_FILES["companyprofile"]["tmp_name"], $targetFile2) &&
        move_uploaded_file($_FILES["attachproposal"]["tmp_name"], $targetFile3)
    ) {

        // Prepare and bind the SQL statement
        $stmt = $connection->prepare("INSERT INTO proposaldata (proposal, officeadd, farmadd, businessno, emailadd, representative, position, address, typeofapp, projectprofile, letterofintent, companyprofile, attachproposal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssss", $firm, $officeadd, $farmadd, $businessno, $emailadd, $representative, $position, $address, $applicationtype, $projectType, $letterofintent, $companyprofile, $attachproposal);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error uploading files.";
    }
}

// Close connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
    <title>Submit Proposal</title>


</head>

<body style="background-image: linear-gradient(45deg, #DFE7F2, #DFE7F2);">
    <div class="container-fluid">
        <div class="row">
            <div class="col mt-3">
                <a href="proposal.php" class="btn btn-outline-primary" role="button" aria-pressed="true" style="margin-left:1200px">Back</a>
                <img src="./assets/9115079.psd.png" alt="" style="width: 100%;">
            </div>
        </div>
    </div>

    <div class="container">

        <div class="col-12 text-center  mt-5">
            <img src="./assets/bplologo.png" alt="" style="width: 155px; height: auto;">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 mt-3" style="border:2px solid #3f3f3f;border-radius: 10px;border-style: inset;">

                    <div class="col-12 text-center mt-4">
                        <h4>Application Form</h4>
                    </div>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="firm" class="small">Name of Firm/Company <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="Firm" aria-describedby="emailHelp" placeholder="Enter Company Name or Firm" name="firm">
                        </div>
                        <div class="form-group">
                            <label for="officeadd" class="small">Office Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="officeadd" placeholder="Enter Office Address" name="officeadd">
                        </div>
                        <div class="form-group">
                            <label for="farmadd" class="small"> Plant/Farm Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="farmadd" placeholder="Enter Farm/Plant Address" name="farmadd">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="businesscontact" class="small">Business Contact No. <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="businessno" placeholder="Enter Business Contact No." name="businesscontact">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="emailadd" class="small">Email Address <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" id="emailadd" placeholder="Enter Email Address" name="emailadd">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="authrep" class="small">Name of Authorized Representative <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="representative" aria-describedby="emailHelp" placeholder="Enter Name of Authorized Representative" name="authrep">
                        </div>
                        <div class="form-group">
                            <label for="position" class="small">Position <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="position" aria-describedby="emailHelp" placeholder="Enter Position" name="position">
                        </div>
                        <div class="form-group">
                            <label for="address" class="small">Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Enter Address" name="address">
                        </div>

                        <div class="container">

                            <div class="row">
                                <div class="col mt-3 mr-2" style="border:2px solid #3f3f3f;border-radius: 10px;border-style: inset;">

                                    <div class="col-12 text-center mt-4">
                                        <h4>Type of Application</h4>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col ml-4">

                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="application_type" id="new_enterprise" value="new_enterprise" checked>
                                                <label class="form-check-label" for="new_enterprise">
                                                    New Enterprise
                                                </label>
                                            </div>

                                        </div>

                                        <div class="col">

                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="application_type" id="new_project" value="new_project">
                                                <label class="form-check-label" for="new_project">
                                                    New Project of an Existing Enterprise
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col ml-4">

                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="application_type" id="existing_enterprise" value="existing_enterprise">
                                                <label class="form-check-label" for="existing_enterprise">
                                                    Existing Enterprise
                                                </label>
                                            </div>

                                        </div>

                                        <div class="col">

                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="application_type" id="expansion_project" value="expansion_project">
                                                <label class="form-check-label" for="expansion_project">
                                                    Expansion Project of an Existing Enterprise
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col mt-3" style="border:2px solid #3f3f3f;border-radius: 10px;border-style: inset;">

                                    <div class="col-12 text-center mt-4">
                                        <h4>Project Profile</h4>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col ml-4">

                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="projectType" id="agriculture" value="agriculture" checked>
                                                <label class="form-check-label" for="agriculture">
                                                    Agriculture/Fishery/Forestry
                                                </label>
                                            </div>

                                        </div>

                                        <div class="col">

                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="projectType" id="development" value="development">
                                                <label class="form-check-label" for="development">
                                                    Infrastructure Development
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col ml-4">

                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="projectType" id="manufacturing" value="manufacturing">
                                                <label class="form-check-label" for="manufacturing">
                                                    Manufacturing Industry
                                                </label>
                                            </div>

                                        </div>

                                        <div class="col">

                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="projectType" id="services" value="services">
                                                <label class="form-check-label" for="services">
                                                    Services
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col ml-4">

                                            <div class="form-group">
                                                <input class="form-check-input" type="radio" name="projectType" id="tourism" value="tourism">
                                                <label class="form-check-label" for="tourism">
                                                    Tourism Development
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 mt-3 mb-2">
                                    <div class="mt-1">
                                        <label for="formFileSm" class="form-label">Attach Letter of Intent <span style="color: red;">*</span></label>
                                        <div style="position: relative;">
                                            <input class="form-control form-control-sm" id="formintent" type="text" placeholder="Choose file..." readonly required>
                                            <input class="form-control form-control-sm" type="file" id="formFileSm" style="position: absolute; top: 0; right: 0; opacity: 0; height: 100%;" name="letterofintent">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="formFileSm" class="form-label">Attach Company Profile <span style="color: red;">*</span></label>
                                        <div style="position: relative;">
                                            <input class="form-control form-control-sm" id="formcprofile" type="text" placeholder="Choose file..." readonly required>
                                            <input class="form-control form-control-sm" type="file" id="formFileSm" style="position: absolute; top: 0; right: 0; opacity: 0; height: 100%;" required name="companyprofile">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label">Attach Proposal <span style="color: red;">*</span></label>
                                        <div style="position: relative;">
                                            <input class="form-control form-control-sm" id="formproposal" type="text" placeholder="Choose file..." readonly required>
                                            <input class="form-control form-control-sm" type="file" id="formFileSm" style="position: absolute; top: 0; right: 0; opacity: 0; height: 100%;" required name="attachproposal">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <!-- Button to trigger confirmation modal -->
                                <button type="button" name="submit" class="btn btn-primary btn-block" id="submitBtn">
                                    Submit
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-block" id="cancelBtn" data-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Submission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit this proposal?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmSubmit">Yes</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Thank you so much for choosing Ormoc as your location for investment. Kindly give us Three (3) days to review your proposal and we will inform you thru email of the decision hoping to do business with you.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
  


</body>

</html>