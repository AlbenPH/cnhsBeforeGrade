<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8= sha256-T+aPohYXbm0fRYDpJLr+zJ9RmYTswGsahAoIsNiMld4=" crossorigin="anonymous"></script>
    <title>Admiistrators</title>

</head>
<body>

    
    <div class="container mt-4">
        <h2>Adminstrators</h2>
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addUserModal">
            Add User
        </button>
        <table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
                <?php
                // PHP code for displaying admin records here
                $conn = new mysqli('localhost', 'root', '', 'userdb');
                if ($conn->connect_error) {
                    die("Connection Failed: " . $conn->connect_error);
                } else {
                    $result = $conn->query("SELECT * FROM admin");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["password"] . "</td>";
                            echo "<td>" . $row["role"] . "</td>";
                            echo '<td><button class="btn btn-danger delete-user" data-id="' . $row["id"] . '">Delete</button></td>';
                            echo "</tr>";
                        }
                    }
                    $conn->close();
                }
                ?>
    </tbody>
</table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8= sha256-T+aPohYXbm0fRYDpJLr+zJ9RmYTswGsahAoIsNiMld4=" crossorigin="anonymous"></script>
   <script>
    $(document).ready(function () {
    $(".delete-user").click(function () {
        var userId = $(this).data("id");
        if (confirm("Are you sure you want to delete this user?")) {
            $.ajax({
                type: "POST",
                url: "php/deleteAdmin.php",
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

    
    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add user form fields here -->
                    <form action="php/addAdmin.php" method="POST">

                        <div class="form-group">
                            <label for="newEmail">Email:</label>
                            <input type="email" class="form-control" id="newEmail" placeholder="Enter email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="newEmail">First Name:</label>
                            <input type="text" class="form-control" id="newEmail" placeholder="First Name" name="firstname">
                        </div>

                        <div class="form-group">
                            <label for="newEmail">Middle Name:</label>
                            <input type="text" class="form-control" id="newEmail" placeholder="Middle name" name="middlename">
                        </div>

                        <div class="form-group">
                            <label for="newEmail">Last Name:</label>
                            <input type="text" class="form-control" id="newEmail" placeholder="Enter email" name="lastname">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Password:</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Enter password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="newRole">Role:</label>
                            <select class="form-control" id="newRole" name="role">
                                <option value="admin">Admin</option>
                               
                                <!-- Add more roles if needed -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>

           
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8= sha256-T+aPohYXbm0fRYDpJLr+zJ9RmYTswGsahAoIsNiMld4=" crossorigin="anonymous"></script>





    <style>
        body{
            background-color: #eaecfa;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>