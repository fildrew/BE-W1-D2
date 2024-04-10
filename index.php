<?php
    echo '<pre>' .print_r($_POST, true) . '</pre>';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = [];

        if (empty($first_name)) {
            $errors[] = 'First name is required';
        }
        if (empty($last_name)) {
            $errors[] = 'Last name is required';
        }
        if (empty($username)) {
            $errors[] = 'Username is required';
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email is invalid';
        }

        if (strlen($password)<8) {
            $errors['password'] = 'Password is too short';
        }
        
        


        if ($errors == []) {
            header('Location: success.php');
        }
    }
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Form validation</title>
<link rel="stylesheet" href="./main.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100" >
        <div class="container py-5 h-100" >
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block ">
                        <img src="https://images.pexels.com/photos/11589778/pexels-photo-11589778.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" height="100px" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form method="POST" action="manage.php" novalidate>
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill=" #ff6219" class="bi bi-boxes" viewBox="0 0 16 16">
                                    <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z"/>
                                </svg>
                                <i class="bi bi-boxes" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0 ms-3">Britannia Transport</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
                                <span class="">Sign Up</span> <br />
                                <span class="small">Fill in the form to create an account</span>
                            </h5>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="validationServer01" class="form-label">First name</label>
                                <input type="text" class="form-control is-valid" id="validationServer01" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>   
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="validationServer02" class="form-label">Last name</label>
                                <input type="text" class="form-control is-valid" id="validationServer02" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="validationServerUsername" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                    <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                                
                            </div>
                            

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" id="form2Example17" class="form-control form-control-lg" />
                                <div class="error"><?= $errors['email'] ?? '' ?></div>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="form2Example27" class="form-control form-control-lg" />
                                <div class="error"><?= $errors['password'] ?? '' ?></div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                                    <label class="form-check-label" for="invalidCheck3">
                                        Agree to terms and conditions
                                    </label>
                                    <div id="invalidCheck3Feedback" class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>

                            <div class="pt-3 mb-4 ">
                                <button class="btn bg-danger btn-lg btn-block rounded-pill w-100" type="button">Submit</button>
                            </div>

                            <!-- <a class="small text-muted" href="#!">Forgot password?</a>
                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                                style="color: #393f81;">Register here</a></p>
                            <a href="#!" class="small text-muted">Terms of use.</a>
                            <a href="#!" class="small text-muted">Privacy policy</a> -->
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>