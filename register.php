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
                    <form action="">
                        <input type="text" name="" class="form-control my-4 py-2" placeholder="Name">
                        <input type="email" name="" class="form-control my-4 py-2" placeholder="Email">
                        <input type="password" name="" class="form-control my-4 py-2" placeholder="Password">
                        <input type="password" name="" class="form-control my-4 py-2" placeholder="Confirm Password">
                        <div class="text-center mt-3">
                            <button class="btn btn-dark mb-2">Register</button>
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