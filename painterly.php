<?php session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
} ?>
<?php if (isset($_SESSION['username'])) : ?>
<?php endif ?></a>
<!DOCTYPE html>

<head>
    <title>Collection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/ae30df8160.js" crossorigin="anonymous"></script>
    <link rel="icon" href="cssimages/favicon.ico">
</head>

<body>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .price {
            color: green;
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

        .nono {
            margin-top: 100px;
            width: 35%;
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

        .bold {
            color: #078ded;
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
                                <li class="nav-item dropdown">
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
                    <div class="col-sm-12 text-center form-div">
                        <table class="table">
                            <a href="mixed.php" class="table">
                                <tr>Mixed</tr> |
                            </a>
                            <a href="realism.php" class="table">
                                <tr>Realism </tr> |
                            </a>
                            <a href="Photorealism.php" class="table">
                                <tr> Photorealism</tr> |
                            </a>
                            <a href="Painterly.php" class="table">
                                <tr><b class="bold"> Painterly</b></tr> |
                            </a>
                            <a href="Impressionism.php" class="table">
                                <tr> Impressionism</tr> |
                            </a>
                            <a href="Abstract.php" class="table">
                                <tr> Abstract</tr> |
                            </a>
                            <a href="Surrealism.php" class="table">
                                <tr> Surrealism</tr>
                            </a>
                        </table>
                    </div>
                </div>
            </div>
            <div class="contain">
                <div class="row">
                    <?php
                    require 'dbConfig.php';
                    $query = "SELECT i.*,u.username,country,email from images i,users u where u.id=user_id && i.category='painterly'";
                    $query_run = mysqli_query($connection, $query);
                    $check_image_upload = mysqli_num_rows($query_run);
                    if ($check_image_upload) {
                        while ($row = mysqli_fetch_array($query_run)) {
                    ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card text-dark bg-light">
                                    <img src="Images/<?php echo $row['image'] ?>" id="myImg" class="card-img-top " style="height: 190px;">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $row['image_title']; ?></h3>
                                        <h4 class="card-title price">₹<?php echo $row['image_price']; ?></h4>
                                        <h7 class="card-title"><?php echo $row['image_text']; ?></h7>
                                        <p class="card-text"><small class=""><i class="fa fa-list" aria-hidden="true"></i> Painting Type <b><?php echo $row['category']; ?></b></small></p>
                                        <p class="card-text"><small class=""><i class="fa fa-user" aria-hidden="true"></i> Uploaded By <b><?php echo $row['username']; ?></b> on <b><?php echo $row['image_date']; ?></b></small></p>
                                        <p class="card-text"><small class=""><i class="fa fa-info-circle" aria-hidden="true"></i> Contact Details <b><?php echo $row['email']; ?></b></small></p>
                                        <p class="card-text"><small class=""><i class="fa fa-map-marker" aria-hidden="true"></i> Country <b><?php echo $row['country']; ?></b></small></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 text-center form-div">
                                    <div class="form-group">
                                        <img src="cssimages/nono.svg" class="nono">
                                        <h2 style="color:gray; margin-top:20px"><small>No Data Found.</small></h2>
                                    </div>
                                <?php } ?>

                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                                </script>
                                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
                                </script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
                                </script>


</body>

</html>