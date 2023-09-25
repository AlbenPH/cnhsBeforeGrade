<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Calingatngan NHS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
<!--  Flaticon added by me-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8= sha256-T+aPohYXbm0fRYDpJLr+zJ9RmYTswGsahAoIsNiMld4=" crossorigin="anonymous"></script>
</head>
<body>


    
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>School Directory: <strong>TEACHING PERSONELS</strong> </h3>
                </div>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">...</a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i
                                class="fas fa-times text-orange-red"></i>Close</a>
                        <a class="dropdown-item" href="#"><i
                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                        <a class="dropdown-item" href="#"><i
                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                    </div>
                </div>
            </div>
            <form class="mg-b-20" >
                <div class="row gutters-8">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search by PRC ID ..." class="form-control">
                    </div>
                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search by Name ..." class="form-control">
                    </div>
                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        
                    </div>
                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>PRC ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Middle Name</th>
                            <th>Gender</th>
                            <th>Advisory class</th>
                          
                         
                            <th>Address</th>
                            <th>Date Of Birth</th>
                            <th>Phone</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
// Create a database connection
$conn = new mysqli('localhost', 'root', '', 'userdb');

// Check the connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Query to retrieve data from the database
$query = "SELECT * FROM teachers";

// Execute the query
$result = $conn->query($query);

// Check if there are any records
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Generate table rows dynamically using PHP
        echo "<tr>";
        echo "<td>" . $row["prcid"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["middlename"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["advisoryclass"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["dateofbirth"] . "</td>";

        echo "<td>" . $row["phonenumber"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo '<td><button class="btn btn-danger delete-user" data-id="' . $row["id"] . '">Delete</button></td>';

        echo "</tr>";
    }
} else {
    echo "No records found.";
}


// Close the database connection
$conn->close();
?>
                  
                        
    <div class="container mt-5">
        <div class="row justify-content-center"> <!-- Center the content horizontally -->
          <div class="col-12 text-center"> <!-- Center the button within the column -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal">ADD TEACHER</button>
          </div>
        </div>
        <div class="modal" id="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add a Teacher</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                        <!--Add Teacher Forms-->
                        <div class="container mt-5">
                            <form action="php/addteacher.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="prcid" name="prcid" required>
                                    <label class="form-label" for="firstName">PRC ID Number</label>
                                  </div>

                              <div class="form-group">
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                                <label class="form-label" for="firstName">First Name</label>
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" id="lastName" name="lastName"required>
                                <label class="form-label" for="lastName">Last Name</label>
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" id="middlename" name="middlename" required>
                                <label class="form-label" for="lastName">Middle Name</label>
                              </div>
                              <div class="form-group">
                                <select class="form-control" id="gender" name="gender" required>
                                    <label class="form-label" for="gender">Gender</label>

                                  <option value="" disabled selected>Select Gender</option>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                                  <option value="other">Other</option>
                                </select>
                              </div>
                            </select>
                          


                              <div class="form-group">
                                <select class="form-control" id="advisoryclass" name="advisoryclass" required>
                                  <option value="" disabled selected>Advisory class</option>
                                  <option value="7">Grade 7</option>
                                  <option value="8">grade 8</option>
                                  <option value="9">grade 9</option>
                                  <option value="10">grade 10</option>
                                  <option value="11">grade 11</option>
                                  <option value="12">grade 12</option>
                                  <option value="notapplicable">Not Applicable</option>
                                 

                                </select>
                              </div>

                             
                              <div class="form-group">
                                    <input type="tel" class="form-control" id="phonenumber" name="phonenumber" required>
                                    <label class="form-label" for="firstName">Phone Number</label>
                                  </div>


                                  

                                  <div class="form-group">
                                    <input type="text" class="form-control" id="address" name="address">
                                    <label class="form-label" for="firstName">Address</label>
                                  </div>

                                  <div class="form-group">
                                    <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" required>
                                    <label class="form-label" for="firstName">Date of Birth</label>
                                  </div>

                                  
                                  <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <label class="form-label" for="firstName">Email</label>
                                  </div>
                                  <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <label class="form-label" for="firstName">password</label>
                                  </div>
                              <!-- Other form fields with labels above -->
                              <button type="submit" class="btn btn-primary">Submit</button>
                           
                          </div>
              </div>
              </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8= sha256-T+aPohYXbm0fRYDpJLr+zJ9RmYTswGsahAoIsNiMld4=" crossorigin="anonymous"></script>

   <script>
    $(document).ready(function () {
    $(".delete-user").click(function () {
        var userId = $(this).data("id");
        if (confirm("Are you sure you want to delete this user?")) {
            $.ajax({
                type: "POST",
                url: "php/deleteTeacher.php",
                data: { id: userId },
                success: function (response) {
                    if (response === "User deleted successfully") {
                        // Reload the page or update the table to reflect the deleted user
                        location.reload();
                    } else {
                        alert("Error deleting user: " + response);
                    }
                }
            });
        }
    });
});
   </script>



      <style>
        .form-group {
            position: relative;
            margin-bottom: 1.5rem; /* Adjust as needed for spacing */
        }

        .form-label {
            position: absolute;
            pointer-events: none;
            left: 1rem;
            top: -0.5rem; /* Adjust to control label positioning */
            transition: 0.2s ease all;
            color: #aaa;
        }

        .form-control {
            padding-top: 1.5rem; /* Adjust to create space for the label */
        }

        .form-control:focus + .form-label,
        .form-control:not(:placeholder-shown) + .form-label {
            top: -1.5rem; /* Adjust based on label positioning */
            font-size: 0.8rem;
            color: #007BFF;
        }

        /* Background color for input fields */
        .bg-input {
            background-color: #f8f9fa; /* Adjust the color as needed */
        }
      </style>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>