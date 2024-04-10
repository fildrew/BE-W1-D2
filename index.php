<?php
    echo '<pre>' .print_r($_POST, true) . '</pre>';
    
    $first_name = $_POST['first_name'] ?? "";
    $last_name = $_POST['last_name'] ?? "";
    $username = $_POST['username'] ?? "";
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";
    $terms = $_POST["terms"] ?? "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $errors = [];

        if (empty($first_name)) {
            $errors['first_name'] = 'First name is required';
        }

        if (empty($last_name)) {
            $errors['last_name'] = 'Last name is required';
        }

        if (strlen($username)< 5 || strlen($username)> 20){
            $errors['username'] = 'Username is required';
        }

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email is invalid';
        }

        if (strlen($password)<8) {
            $errors['password'] = 'Password is too short';
        }

        if(!$terms === "on") {
            $errors["terms"] = "Devi accettare i termini e le condizioni";
        }
        

        if ($errors === []) {
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
    <section class="vh-90" >
        <div class="container py-5 h-100" >
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block ">
                        <img src="https://images.pexels.com/photos/11589778/pexels-photo-11589778.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" height="00px" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form method="post" action="" novalidate>
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

                            <div class="form-outline mb-4">
                                <label for="validationServer01" class="form-label">First name</label>
                                <input type="text" class="form-control is-valid <?= isset($errors['first_name']) ? 'is-invalid' : ''?>" name="user_name" id="firstname" value="<?php echo $first_name;?>" required>
                                <?= $errors['first_name'] ?? "" ?>
                              
                            </div>

                            <div class="form-outline mb-4">
                                <label for="lastname" class="form-label">Last name</label>
                                <input type="text" class="form-control is-valid  <?= isset($errors['last_name']) ? 'is-invalid' : ''?>" id="last_name" value="<?php echo $last_name;?>" required>
                                <?= $errors['last_name'] ?? "" ?>
                                
                                
                            </div>

                            <div class="form-outline mb-4">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                    <input type="text" class="form-control is-invalid <?= isset($errors['username']) ? 'is-invalid' : ''?>" id="username"  value="<?php echo $username;?>" name="user_name" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                                    <?= $errors['username'] ?? "" ?>
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                                
                            </div>
                            

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="text" id="email" value="<?php echo $email;?>" class="form-control form-control-lg <?= isset($errors['email']) ? 'is-invalid' : "" ?>" required>
                                <?= $errors['email'] ?? '' ?>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control form-control-lg <?= isset($errors['password']) ? 'is-invalid' : "" ?>" required>
                                <?= $errors['password'] ?? '' ?>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input <?= isset($errors["terms"]) ? "is-invalid" : "" ?>" type="checkbox" name="terms" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                     <?= $errors["terms"] ?? "" ?>
                                    </div>
                                    
                                    <div id="invalidCheck3Feedback" class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
        
                                </div>
                            </div>

                            <div class="pt-3 mb-4 button">
                                <button class="btn bg-danger btn-lg btn-block rounded-pill w-100" type="submit">Submit</button>
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