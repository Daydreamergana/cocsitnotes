<?php
$conn = mysqli_connect("localhost", "root", "", "college_notes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Now</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-4 ">
            <center style="color:white; background-color:black;font-size:30px">New to this website?</center>
            <hr>
            <p> If you are new to this site,Create an account on this site and log in to access free notes.<br> To
                create
                an account click here.<br>
                <a href="signup" class="btn btn-danger btn-lg text-white mt-5 mb-5" style="padding:10px">Sign-Up!!</a>
            </p>
        </div>
        <div class="col-sm-8 ">
            <center style="color:white; background-color:green;font-size:30px">Login to your account!</center>
            <hr>
            <form method="post" action="">
                <label style="font-size:19px;font-family:Times New Roman">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter your Email-Id" name="emailid" required>
                <small class="form-text text-muted">We'll never share your email with anyone
                    else.</small><br>
                <label style="font-size:19px;font-family:Times New Roman">Password:</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="pwd" required>
                <div class="text-center">
                    <br>
                    <div>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                    <input type="submit" class="btn btn-primary mt-5"
                           style="padding: 14px 40px; font-weight:bold;font-size:20px"
                           value="Log-in!!">
                </div>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['emailid'];
                $pass = $_POST['pwd'];
                // Prepare and execute query using prepared statement
                $sql = "SELECT * FROM student WHERE email = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<script>window.location.href = 'after_login.html';</script>";
                        exit; // Terminate the script to prevent further execution

                    }
                }
              }
            ?>
        </div>
    </div>
</div>
</body>
</html>
