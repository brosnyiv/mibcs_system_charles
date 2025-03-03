<?php
include"header.php";
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <!-- Pie Chart -->
                        <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Compliant </h6>
                                    </div>
                                <!-- Card Body -->
                                <div class="card-body">
                              <?php 
                                  if(isset($_POST['request'])) {
    // Escape user input to prevent SQL injection
    $demand = mysqli_real_escape_string($conn, $_POST['emergency']);
    $ecost = mysqli_real_escape_string($conn, $_POST['ecost']);
    // Prepare SQL statement
    $check_sql = "SELECT * FROM request WHERE scid='$user_id' and status='Pending'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Request already exists for this user
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fas fa-info-circle"></i>
                    A request has already been submitted. Please check <a href="tracking.php">Tracking..</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        } else {
        $sql = "INSERT INTO request (scid, apply_for, demand, expected_amount, remarks, year, month, status)
                    VALUES ('$user_id', 'Emergency', '$demand', '$ecost', 'Waiting for visit','$year', '$month', 'Pending')";

            if (mysqli_query($conn, $sql)) {
              $last_id = mysqli_insert_id($conn);
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle mr-2"></i> Request added successfully. Track this Request <a href="tracking.php">Tracking..</a>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error: ' . $sql . '<br>' . mysqli_error($conn) . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
    }

    mysqli_close($conn);
}
}
?>
                     <form class="user" method="post">
                                         <div class="form-group">
<label for="cars">Select Emergency:</label>
<select class="form-control" name="emergency" >
    <option value="Grade Disputes">Grade Disputes</option>
    <option value="Result Processing Errors">Result Processing Errors</option>
    <option value="Examination-Related Complaints">Examination-Related Complaints</option>
    <option value=" Special Considerations"> Special Considerationss</option>
    <option value="Academic Misconduct Accusations">Academic Misconduct Accusationss</option>
    <option value="Accessibility Complaints">Accessibility Complaints</option>
</select>
<div class="form-group">
                                         <label for="cars">Name:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" value="<?php echo $fname?> <?php echo $name?> " readonly>
                                        </div>

                                        <div class="form-group">
                                         <label for="cars">Student ID:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" value="<?php echo $cnic?>" readonly>
                                        </div>

                                        </div>
                                         <div class="form-group">
                                         <label for="cars">Program:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" value="<?php echo $program;?>" readonly>
                                        </div>

                                        <div class="form-group">
                                         <label for="cars">Department:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" value="<?php echo $dist;?>" readonly>
                                        </div>

                                        <div class="form-group">
                                         <label for="cars">Contact Number:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" value="<?php echo $contact;?>" readonly>
                                        </div>

                                        <div class="form-group">
                                         <label>Description of the Issue :</label>
                                         <textarea>

                                        </textarea>

                                        <div class="upload-container">
        
        <form id="uploadForm">
            <label for="fileUpload"> Upload Your complaint:</label>
            <input type="file" id="fileUpload" name="fileUpload" accept=".pdf, .doc, .docx, .txt" required>
            <span class="error-message" id="errorMessage"></span>
            
        </form>
    </div>

    <script>
        const form = document.getElementById("uploadForm");
        const fileInput = document.getElementById("fileUpload");
        const errorMessage = document.getElementById("errorMessage");

        // Event listener for form submission
        form.addEventListener("submit", function(event) {
            errorMessage.textContent = ""; // Clear previous errors
            const file = fileInput.files[0];

            // Validate file
            if (!file) {
                errorMessage.textContent = "Please select a file.";
                event.preventDefault();
                return;
            }

            const validExtensions = ["pdf", "doc", "docx", "txt"];
            const fileExtension = file.name.split('.').pop().toLowerCase();

            if (!validExtensions.includes(fileExtension)) {
                errorMessage.textContent = "Invalid file type. Please upload a PDF, DOC, DOCX, or TXT file.";
                event.preventDefault();
            }

            if (file.size > 5 * 1024 * 1024) { // 5 MB size limit
                errorMessage.textContent = "File size exceeds the 5MB limit.";
                event.preventDefault();
            }
        });
    </script>

                                        </div>

                                        
                                         
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="request" value="Submit Request">
                                        </a>
                                </div>
                            </div>
          </div>

                    
                                        

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                          <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Complaints</h6>
                        </div>
                        <div class="card-body">
                          <h6 class="m-0 font-weight-bold text-primary">Grade Disputes:</h6>
                          •	Incorrect Marks: Marks were not calculated or recorded accurately.<br>
•	Unfair Grading: The grading process seems biased or inconsistent.<br>
•	Unassessed Answers: Sections of their answer sheet or specific questions were overlooked or not graded.

<br><br>
<h6 class="m-0 font-weight-bold text-primary">Result Processing Errors:</h6>
•	Incorrect Subject Result: Results for subjects the student did not register for appear on their record.<br>
•	Missing Results: Results for one or more subjects are missing.<br>
•	Wrong Name/Details: Results are assigned to the wrong student or display incorrect personal details.

<br><br>
<h6 class="m-0 font-weight-bold text-primary">Examination-Related Complaints:</h6>
•	Clerical Errors: Errors in transferring marks from scripts to the results portal.<br>
•	Delayed Results: Results were not released on time, causing inconvenience.<br>
•	Incorrect GPA/CGPA Calculation: The cumulative score doesn't align with the marks provided.

<br><br>
<h6 class="m-0 font-weight-bold text-primary">Special Considerations:</h6>
•	Appeal for Re-Evaluation: Request for a review or regrading of their answer scripts.<br>
•	Incorrect Application of Rules: Issues such as penalties for late submissions not applied correctly or other rules misapplied.
<br><br>

<h6 class="m-0 font-weight-bold text-primary">Accessibility Complaints:</h6>
•	Portal Issues: Difficulty accessing results online due to technical problems.<br>
•	Unreadable Format: Results not displayed clearly or in a comprehensible format.
<br><br>

<h6 class="m-0 font-weight-bold text-primary">Academic Misconduct Accusations:</h6>
•	Unjustified Penalty: The student feels they were penalized for misconduct unfairly.<br>
•	Plagiarism Allegation Errors: Wrongful accusations of copying or plagiarism.
<br><br>


 <a href="emergency-fund.pdf" target="_blank" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-tv"></i>
                                        </span>
                                        <span class="text">Download Compliant Details</span>
                                    </a>
                                </div>
                               </div>
                            </div>
                                                </div>
                                                              
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include"footer.php"; ?>