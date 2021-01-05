<?php
session_start();
$user = $_SESSION["username"];
$con = mysqli_connect('localhost', 'root', '', 'paintsup') or die('Unable To connect');
if (count($_POST) > 0) {
  $result = mysqli_query($con, "SELECT * from users where username='$user'");
  $row = mysqli_fetch_array($result);
  if ($_POST["password_1"] == $row["password"] && $_POST["newPassword"] == $_POST["cfmPassword"]) {
    mysqli_query($con, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE username='" . $user . "'");
    $message = "Password Changed Sucessfully";
  } else {
    $message = "Password is not correct";
  }
}
?>
<!DOCTYPE html>

<html>

<head>
  <title>Password Change</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<link rel="icon" href="cssimages/favicon.ico">

<body>
  <style type="text/css">
    #content {
      width: 50%;
      margin: 20px auto;
      border: 1px solid #cbcbcb;
    }

    form {
      width: 50%;
      margin: 20px auto;
    }

    form div {
      margin-top: 5px;
    }


    img {
      float: left;
      margin: 5px;

    }

    .price {
      float: left;
    }

    span {
      color: #078ded;
    }

    .form {
      margin-top: 50px;
    }

    .cp {
      width: 50%;
      margin-left: 20%;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    span {
      color: #078ded;
    }

    .card {
      margin-top: 15px;
    }

    .container-fluid {
      padding: 23px;
    }

    .nav-item {
      padding: 0 10px;
    }

    .nav-link {
      font-weight: lighter;
      font-size: 1.2rem;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .navbar-brand {
      font-weight: bolder;
      font-size: 25px;
    }


    span {
      color: #078ded;
    }

    .contain {
      margin: 30px;
      margin-top: 0px;
    }

    .table {
      color: black;
      font-size: large;
      text-decoration: none;
    }
  </style>
  <section id="title">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a href="index2.php"><img src="cssimages/newup.png" style="margin-right:4px" width="40" height="40" alt=""></a>
        <a class="navbar-brand" href="mixed.php"> Paints<span>Up</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="sellpaintings.php">Sell Paintings <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="mypaintings.php">My Paintings</a>
                </li>
                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> My Account</a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="changepassword.php" class="nav-link">Change Password</a>
                    <a class="dropdown-item" href="report.php">Report a problem</a>
                    <a class="dropdown-item" href="logout.php?logout='1'" class="nav-link" style="color: red;">Logout</a>
                  </div>
                </li>
              </ul>
            </div>
      </nav>

      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center form-div">
            <form method="POST" action="" enctype="multipart/form-data" class="form">
              <img src="cssimages/cp.svg" class="cp">
              <br><br><br><br><br><br><br><br><br>
              <div class="form-group">
                <label class="price">Current Password</label>
                <input type="password" name="password_1" class="form-control" placeholder="Enter your current password">
              </div>
              <div class="form-group">
                <label class="price">New Password</label>
                <input type="password" name="newPassword" class="form-control" placeholder="Enter your current password">
              </div>
              <div class="form-group">
                <label class="price">Confirm Password</label>
                <input type="password" name="cfmPassword" class="form-control" placeholder="Enter your new password again">
              </div>
              <p>You're changing the password for user <b><?php echo $user ?></b></p>
              <div>
                <p style="color:blue" ;><?php if (isset($message)) {
                                          echo $message;
                                        } ?></p>
              </div>
              <div class="form-group">
                <button type="submit" id="upload" value="upload" class="btn btn-primary btn-block" name="upload">Submit</button>
              </div>
            </form>
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