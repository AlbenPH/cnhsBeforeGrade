
<?php
session_start();

// Check if the user is logged in (session contains "id")
if (!isset($_SESSION["id"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php"); // Replace with the actual login page
    exit();
}

// Get the user's email from the session
$email = $_SESSION["id"]["email"]; // Assuming "email" is the column name in your database

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'userdb');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Fetch the user's information from the database based on their email
$stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$userInfo = $result->fetch_assoc();

// Close the database connection
$stmt->close();
$conn->close();

?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Team HD | All Students</title>
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
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preldoader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.php">
                        <img src="img/cnhslogo__1_-removebg-preview.png" alt="logo">
                    </a>
                </div>
                  <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                        <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Find Something . . .">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title"><?php echo isset($userInfo["firstname"]) ? $userInfo["firstname"] : '' ; ?></h5>
                                
                                <span>Admin</span>
                            </div>
                            <div class="admin-img">
                                <img src="img/figure/admin.jpg" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title"><?php echo isset($userInfo["firstname"]) ? $userInfo["firstname"] : '' ; ?></h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li><a href="#"><i class="flaticon-user"></i>My Profile</a></li>
                                    <li><a href="#"><i class="flaticon-list"></i>Task</a></li>
                                    <li><a href="#"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Message</a></li>
                                    <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li>
                                    <li><a href="login.html"><i class="flaticon-turn-off"></i>Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="navbar-item dropdown header-message">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-envelope"></i>
                            <div class="item-title d-md-none text-16 mg-l-10">Message</div>
                            <span>5</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">05 Message</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-img bg-skyblue author-online">
                                        <img src="img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Maria Zaman</span> 
                                                <span class="item-time">18:30</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-yellow author-online">
                                        <img src="img/figure/student12.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Benny Roy</span> 
                                                <span class="item-time">10:35</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-pink">
                                        <img src="img/figure/student13.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Steven</span> 
                                                <span class="item-time">02:35</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-violet-blue">
                                        <img src="img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Joshep Joe</span> 
                                                <span class="item-time">12:35</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navbar-item dropdown header-notification">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <div class="item-title d-md-none text-16 mg-l-10">Notification</div>
                            <span>8</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">03 Notifiacations</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-icon bg-skyblue">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Complete Today Task</div>
                                        <span>1 Mins ago</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-icon bg-orange">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Director Metting</div>
                                        <span>20 Mins ago</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-icon bg-violet-blue">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Update Password</div>
                                        <span>45 Mins ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                     <li class="navbar-item dropdown header-language">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe-americas"></i>EN</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">English</a>
                            <a class="dropdown-item" href="#">Spanish</a>
                            <a class="dropdown-item" href="#">Franchis</a>
                            <a class="dropdown-item" href="#">Chiness</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.php"><img src="img/logo1.png" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item">
                         
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                            <ul class="nav sub-group-menu sub-group-active">
                                <li class="nav-item">
                                    <a href="all-student.html" class="nav-link menu-active"><i class="fas fa-angle-right"></i>All
                                        Students</a>
                                </li>
                             
                                <li class="nav-item">
                                    <a href="admit-form-final.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Admission Form</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i
                                    class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="teachersList.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Teachers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="teachersList.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Teacher Details</a>
                                </li>
                                
                                
                            </ul>
                        </li>
                        
                        
                      
                      
                       
                       

                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>All Students</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Table Area Start Here -->
                
               

                <!--Grade 12-->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Grade 7 Students Data</h3>
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
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Class ..." class="form-control">
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
                                        
                        
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>LRN</th>
                                        <th>BirthDate</th>
                                 
                                        <th>Religion</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    // PHP code to fetch and display data for Grade 7
                    // Replace 'your_database_username', 'your_database_password', and 'your_database_name' with actual values
                    $conn = mysqli_connect("localhost", "root", "", "userdb");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sql = "SELECT * FROM students WHERE Grade = '7'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                      
                            echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";

                            echo "<td>" . $row["grade"] . "</td>";
                            echo "<td>" . $row["section"] . "</td>";
                            echo "<td>" . $row["lrn"] . "</td>";
                            echo "<td>" . $row["dateofbirth"] . "</td>";
                            echo "<td>" . $row["religion"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo '<td><button class="btn btn-danger delete-user" data-id="' . $row["id"] . '">Delete</button></td>';

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No records found</td></tr>";
                    }
                    
                    mysqli_close($conn);
                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>







                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Grade 8 Students Data</h3>
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
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Class ..." class="form-control">
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
                                        
                        
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>LRN</th>
                                        <th>BirthDate</th>
                                 
                                        <th>Religion</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    // PHP code to fetch and display data for Grade 7
                    // Replace 'your_database_username', 'your_database_password', and 'your_database_name' with actual values
                    $conn = mysqli_connect("localhost", "root", "", "userdb");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sql = "SELECT * FROM students WHERE Grade = '8'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                      
                            echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";

                            echo "<td>" . $row["grade"] . "</td>";
                            echo "<td>" . $row["section"] . "</td>";
                            echo "<td>" . $row["lrn"] . "</td>";
                            echo "<td>" . $row["dateofbirth"] . "</td>";
                            echo "<td>" . $row["religion"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo '<td><button class="btn btn-danger delete-user" data-id="' . $row["id"] . '">Delete</button></td>';

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No records found</td></tr>";
                    }
                    
                    mysqli_close($conn);
                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>







                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Grade 9 Students Data</h3>
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
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Class ..." class="form-control">
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
                                        
                        
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>LRN</th>
                                        <th>BirthDate</th>
                                 
                                        <th>Religion</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    // PHP code to fetch and display data for Grade 7
                    // Replace 'your_database_username', 'your_database_password', and 'your_database_name' with actual values
                    $conn = mysqli_connect("localhost", "root", "", "userdb");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sql = "SELECT * FROM students WHERE Grade = '9'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                      
                            echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";

                            echo "<td>" . $row["grade"] . "</td>";
                            echo "<td>" . $row["section"] . "</td>";
                            echo "<td>" . $row["lrn"] . "</td>";
                            echo "<td>" . $row["dateofbirth"] . "</td>";
                            echo "<td>" . $row["religion"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo '<td><button class="btn btn-danger delete-user" data-id="' . $row["id"] . '">Delete</button></td>';

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No records found</td></tr>";
                    }
                    
                    mysqli_close($conn);
                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Grade 10 Students Data</h3>
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
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Class ..." class="form-control">
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
                                        
                        
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>LRN</th>
                                        <th>BirthDate</th>
                                 
                                        <th>Religion</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    // PHP code to fetch and display data for Grade 7
                    // Replace 'your_database_username', 'your_database_password', and 'your_database_name' with actual values
                    $conn = mysqli_connect("localhost", "root", "", "userdb");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sql = "SELECT * FROM students WHERE Grade = '10'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                      
                            echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";

                            echo "<td>" . $row["grade"] . "</td>";
                            echo "<td>" . $row["section"] . "</td>";
                            echo "<td>" . $row["lrn"] . "</td>";
                            echo "<td>" . $row["dateofbirth"] . "</td>";
                            echo "<td>" . $row["religion"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo '<td><button class="btn btn-danger delete-user" data-id="' . $row["id"] . '">Delete</button></td>';

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No records found</td></tr>";
                    }
                    
                    mysqli_close($conn);
                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>











                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Grade 11 Students Data</h3>
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
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Class ..." class="form-control">
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
                                        
                        
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>LRN</th>
                                        <th>BirthDate</th>
                                 
                                        <th>Religion</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    // PHP code to fetch and display data for Grade 7
                    // Replace 'your_database_username', 'your_database_password', and 'your_database_name' with actual values
                    $conn = mysqli_connect("localhost", "root", "", "userdb");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sql = "SELECT * FROM students WHERE Grade = '11'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                      
                            echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";

                            echo "<td>" . $row["grade"] . "</td>";
                            echo "<td>" . $row["section"] . "</td>";
                            echo "<td>" . $row["lrn"] . "</td>";
                            echo "<td>" . $row["dateofbirth"] . "</td>";
                            echo "<td>" . $row["religion"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo '<td><button class="btn btn-danger delete-user" data-id="' . $row["id"] . '">Delete</button></td>';

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No records found</td></tr>";
                    }
                    
                    mysqli_close($conn);
                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Grade 12 Students Data</h3>
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
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Class ..." class="form-control">
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
                                        
                        
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>LRN</th>
                                        <th>BirthDate</th>
                                 
                                        <th>Religion</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    // PHP code to fetch and display data for Grade 7
                    // Replace 'your_database_username', 'your_database_password', and 'your_database_name' with actual values
                    $conn = mysqli_connect("localhost", "root", "", "userdb");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sql = "SELECT * FROM students WHERE Grade = '12'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                      
                            echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";

                            echo "<td>" . $row["grade"] . "</td>";
                            echo "<td>" . $row["section"] . "</td>";
                            echo "<td>" . $row["lrn"] . "</td>";
                            echo "<td>" . $row["dateofbirth"] . "</td>";
                            echo "<td>" . $row["religion"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo '<td><button class="btn btn-danger delete-user" data-id="' . $row["id"] . '">Delete</button></td>';

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No records found</td></tr>";
                    }
                    
                    mysqli_close($conn);
                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Student Table Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">Team HD</a> 2019. All rights reserved. Designed by <a
                            href="#">Team  HD</a></div>
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8= sha256-T+aPohYXbm0fRYDpJLr+zJ9RmYTswGsahAoIsNiMld4=" crossorigin="anonymous"></script>
   <script>
    $(document).ready(function () {
    $(".delete-user").click(function () {
        var userId = $(this).data("id");
        if (confirm("Are you sure you want to delete this user?")) {
            $.ajax({
                type: "POST",
                url: "php/deleteStudent.php",
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

 
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>

</html>