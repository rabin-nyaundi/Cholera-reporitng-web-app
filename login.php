<?php 
    include('includes/handleLogin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Cholera Reporting App</title>
    
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom css -->
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
    <div class="container">
        <div class="row row_container">
            <div class="col-md-4 form-cont">
                <div class="header">
                    <h4 class="p-1 head">Login | <span class="top-head">Cholera Alert</span></h4>
                </div>
                <div class="logo_div">
                    <div class="logo">
                        <img class="image-logo" src="images/logo//Report-cholera-logos.jpeg" alt="report-cholera" width="100%">
                    </div>
                </div>
                
                <form action="includes/handleLogin.php" method="post">

                    <?php if(isset($_SESSION['errors'])) : ?>
                        <div class="alert alert-danger">
                            <?php foreach($_SESSION['errors'] as $error) : ?>
                                <p> <?php echo $error ?> </p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="row p-3">
                        <div class="username">
                            <i class="fa fa-user"></i>
                            <input class="form-control input-field" type="email" name="username" id="user_name" placeholder="Username or Email" required>
                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="password">
                            <i class="fa fa-lock"></i>
                            <input class="form-control input-field" type="password" name="password" id="user_pass" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="remember">
                            <input type="checkbox" name="remember-me" id="remember_me">
                            <label for="remember-me">Remember me</label>
                        </div>
                    </div>

                    <div class="row p-2 text-center">
                        <div class="login">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="register">
                            <p>Already have an account? <a href="register.php">Register</a></p>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>

<i class="fa fa-search"></i>