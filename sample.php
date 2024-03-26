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
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Proposal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">

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
                    <form id="proposalForm" method="post" action="sample.php" enctype="multipart/form-data" onsubmit="validateEmptyFields">
                        <div class="form-group form-group-lg">
                            <label for="firm" class="small">Name of Firm/Company <span style="color: red;">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="firm" aria-describedby="emailHelp" placeholder="Enter Company Name or Firm" name="firm" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <label for="officeadd" class="small">Office Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="officeadd" placeholder="Enter Office Address" name="officeadd" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <label for="farmadd" class="small"> Plant/Farm Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="farmadd" placeholder="Enter Farm/Plant Address" name="farmadd" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group form-group-lg">
                                    <label for="businesscontact" class="small">Business Contact No. <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control form-control-lg" id="businessno" placeholder="Enter Business Contact No." name="businesscontact" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group form-group-lg">
                                    <label for="emailadd" class="small">Email Address <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control form-control-lg" id="emailadd" placeholder="Enter Email Address" name="emailadd" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group-lg">
                            <label for="authrep" class="small">Name of Authorized Representative <span style="color: red;">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="representative" aria-describedby="emailHelp" placeholder="Enter Name of Authorized Representative" name="authrep" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <label for="position" class="small">Position <span style="color: red;">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="position" aria-describedby="emailHelp" placeholder="Enter Position" name="position" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <label for="address" class="small">Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="address" aria-describedby="emailHelp" placeholder="Enter Address" name="address" required>
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
                        </div>

                        <div class="form-group mt-3">
                            <label for="letterofintent" class="small">Letter of Intent <span style="color: red;">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="letterofintent" name="letterofintent" onchange="updateFileName('letterofintent')" required>
                                <label class="custom-file-label" for="letterofintent">Choose file...</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="companyprofile" class="small">Company Profile <span style="color: red;">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="companyprofile" name="companyprofile" onchange="updateFileName('companyprofile')" required>
                                <label class="custom-file-label" for="companyprofile">Choose file...</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="attachproposal" class="small">Attach Proposal <span style="color: red;">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="attachproposal" name="attachproposal" onchange="updateFileName('attachproposal')" required>
                                <label class="custom-file-label" for="attachproposal">Choose file...</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Submit Proposal</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Thank you so much for choosing Ormoc as your location for investment. Kindly give us Three (3) days to review your proposal and we will inform you thru email of the decision hoping to do business with you.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmSubmit" class="btn btn-primary">Submit Proposal</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById("proposalForm").addEventListener("submit", function(event) {
            var form = event.target;
            var inputs = form.querySelectorAll("input, select, textarea");
            var isValid = true;

            inputs.forEach(function(input) {
                if (input.hasAttribute("required") && input.value.trim() === "") {
                    isValid = false;
                    input.classList.add("is-invalid");
                } else {
                    input.classList.remove("is-invalid");
                }
            });

            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
            }
        });

        function updateFileName(inputId) {
            // Get the selected file name
            var fileName = document.getElementById(inputId).files[0].name;
            // Update the label text with the selected file name
            document.getElementById(inputId).nextElementSibling.innerText = fileName;
        }
    </script>

    <script>
        // Function to validate empty fields
        function validateEmptyFields() {
            var inputs = document.querySelectorAll("input, select, textarea");
            var isValid = true;

            inputs.forEach(function(input) {
                if (input.hasAttribute("required") && input.value.trim() === "") {
                    isValid = false;
                    input.classList.add("is-invalid");
                } else {
                    input.classList.remove("is-invalid");
                }
            });

            return isValid;
        }

        // Add event listeners to input fields for validation
        document.addEventListener("DOMContentLoaded", function() {
            var inputs = document.querySelectorAll("input, select, textarea");

            inputs.forEach(function(input) {
                input.addEventListener("blur", function() {
                    validateEmptyFields();
                });
            });
        });

        // Submit event listener for final validation
        document.getElementById("proposalForm").addEventListener("submit", function(event) {
            if (!validateEmptyFields()) {
                event.preventDefault(); // Prevent form submission if fields are empty
                event.stopPropagation();
            }
        });

        // Function to update file input label with selected file name
        function updateFileName(inputId) {
            var fileName = document.getElementById(inputId).files[0].name;
            document.getElementById(inputId).nextElementSibling.innerText = fileName;
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var businessNoInput = document.getElementById("businessno");

            businessNoInput.addEventListener("input", function() {
                // Remove any non-numeric characters except "-"
                var sanitizedValue = this.value.replace(/[^\d-]/g, "");
                // Update the input value with only the numeric characters and "-"
                this.value = sanitizedValue;
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var submitBtn = document.getElementById("submitBtn");

            submitBtn.addEventListener("click", function() {
                // Perform final validation before submission
                if (validateEmptyFields()) {
                    // If all fields are valid, submit the form
                    document.getElementById("proposalForm").submit();
                } else {
                    // If there are empty fields, show an error message or handle it as you wish
                    alert("Please fill in all required fields.");
                }
            });
        });
    </script>

    <script>
        document.getElementById("confirmSubmit").addEventListener("click", function() {
            document.getElementById("proposalForm").submit();
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-afNy4n2rEcSkCJcD/xElvKWldfRmW4AjTWFV4Tl+KZq+y4FsG5wdhK+21vprE2Q5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>






</html>