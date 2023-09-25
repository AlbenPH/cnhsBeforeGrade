
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
    <title>TEAM | Students Details</title>
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->

<!-- Your HTML code for displaying user information goes here -->



    <div id="wrapper" class="wrapper bg-ash">
         <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    
                        <img src="img/logo.png" alt="logo">
                    
                </div>
          
                
                   
                 
                     
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
                        <a href="index.html"><img src="img/logo (2).png" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Contact Us</span></a>
                          
                        <li class="nav-item sidebar-nav-item">
                            <a href="grades.php" class="nav-link"><i class="flaticon-classmates"></i><span>Grades</span></a>
                           
                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="grades.php" class="nav-link"><i class="flaticon-classmates"></i><span>Enroll</span></a>
                           
                        </li>

                        
                        
                        
                        
                        </li>
                       
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Profile</h3>
                    <ul>
                        <li>
                        
                        </li>
                        <li>Student Details</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Details Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>About Me</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-info-details">
                           
                            <div class="item-content">
                                <div class="header-inline item-header">
                                    <h3 class="text-dark-medium font-medium"><?php echo isset($userInfo["lastname"]) ? $userInfo["firstname"] : ''; ?></h3>
                                    <div class="header-elements">
                                        <ul>
                                            <li><a href="#"><i class="far fa-edit"></i></a></li>
                                            <li><a href="#"><i class="fas fa-print"></i></a></li>
                                            <li><a href="#"><i class="fas fa-download"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                
                               
                                <div class="info-table table-responsive">
    <table class="table text-nowrap">
        <tbody>
            <tr>
                <td>Name:</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["firstname"]) ? $userInfo["firstname"] : '' ; ?>
                    <?php echo isset($userInfo["middlename"]) ? $userInfo["middlename"] : '' ; ?>
                    <?php echo isset($userInfo["lastname"]) ? $userInfo["lastname"] : '' ; ?>

                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td class="font-medium text-dark-medium" id="gender">
                    <?php echo isset($userInfo["gender"]) ? $userInfo["gender"] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Grade:</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["grade"]) ? $userInfo["grade"] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Section:</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["section"]) ? $userInfo["section"] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Date Of Birth:</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["dateofbirth"]) ? $userInfo["dateofbirth"] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Religion:</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["religion"]) ? $userInfo["religion"] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>LRN:</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["lrn"]) ? $userInfo["lrn"] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["email"]) ? $userInfo["email"] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Admission Date:</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["dateenrolled"]) ? $userInfo["dateenrolled"] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Phone number</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["phonenumber"]) ? $userInfo["phonenumber"] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Blood Group:</td>
                <td class="font-medium text-dark-medium">
                    <?php echo isset($userInfo["bloodgroup"]) ? $userInfo["bloodgroup"] : ''; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<a href="php/logout.php" class="btn btn-danger">Logout</a>


      <!-- Student Details Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">TEAM HD</a> 2023 Project <a href="#"></a></div>
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>

</html>