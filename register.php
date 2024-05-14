<?php

include "db.php";

if (isset($_POST['register'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);
    $error = [];

    empty($name) ? $error[] = "Name is required." : "";
    empty($email) ? $error[] = "Email is required." : "";
    empty($password) ? $error[] = "Password is required." : "";
    empty($cpassword) ? $error[] = "Confirm Password is required." : "";
    $password != $cpassword ?  $error[] = "Password and Confirm Password is not match." : "";


    if (!$error) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $error[] = "Email is already exist.";
            } else {
                $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    header("Location: login.php");
                } else {
                    echo mysqli_connect_error();
                }
            }
        } else {
            echo mysqli_connect_error();
        }
    }
}

?>

<?php
include("./component/header.php"); ?>

<div class="mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card border-1 shadow">
                <div class="card-body">
                    <span id="person-svg" class="text-center fs-1 fw-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg> Register</span>
                    <form action="" method="post">
                        <?php include "error.php" ?>
                        <input type="text" name="name" class="form-control my-4 py-2" placeholder="Name">
                        <input type="email" name="email" class="form-control my-4 py-2" placeholder="Email">
                        <input type="password" name="password" class="form-control my-4 py-2" placeholder="Password">
                        <input type="password" name="cpassword" class="form-control my-4 py-2" placeholder="Confirm Password">
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary  mb-2" name="register" value="register">Register</button>
                            <p>Already Have Account? <a href="login.php">Login</a> Here.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("./component/footer.php"); ?>