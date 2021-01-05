<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'paintsup');

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = ($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            header('location: mixed.php');
        } else {
            array_push($errors, "Wrong username or password");
        }
    }
}
?>
<!DOCTYPE html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&display=swap" rel="stylesheet">
    <link rel="icon" href="cssimages/favicon.ico">
</head>

<body>

    <style>
        body {
            padding-top: 4.2rem;
            padding-bottom: 4.2rem;
            background: rgba(0, 0, 0, 0.76);
            background-image: url(cssimages/login.jpg);
            background-size: 100%;
        }

        a {
            text-decoration: none !important;
        }

        h1 {
            font-family: 'Lobster Two', cursive;
        }

        .myform {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            padding: 1rem;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 1.1rem;
            box-shadow: 0px 0px 10px 0px;
            outline: 1;
            max-width: 500px;
        }

        .tx-tfm {
            text-transform: uppercase;
        }

        .mybtn {
            border-radius: 50px;
        }

        .login-or {
            position: relative;
            color: #aaa;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .span-or {
            display: block;
            position: absolute;
            left: 50%;
            top: -2px;
            margin-left: -25px;
            background-color: #fff;
            width: 50px;
            text-align: center;
        }

        .hr-or {
            height: 1px;
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }

        .error {
            width: 92%;
            margin: 0px auto;
            padding: 10px;
            padding-bottom: 0px;
            border: 2px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 10px;
            text-align: left;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Login</h1>
                            </div>
                        </div>
                        <form method="post" action="">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <?php include('errors.php'); ?>
                            <br>
                            <div class="col-md-12 text-center ">
                                <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" class="btn" name="login_user">Login</button>
                            </div>
                            <div class="col-md-12">
                                <div class="login-or">
                                    <hr class="hr-or">
                                    <span class="span-or">or</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="text-center">Don't have an account? <a href="signup.php" id="signup">Sign Up here!</a>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-center">Continue browsing? <a href="index.php" id="signup">Click here to
                                        go back!</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>