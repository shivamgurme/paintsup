<?php session_start();
$errors = array();
$db = mysqli_connect("localhost", "root", "", "paintsup");
$timezone = date_default_timezone_set("Asia/Kolkata");
$msg = "";
$user = $_SESSION["username"];
$query = mysqli_query($db, "SELECT * from users where username='$user'");
$row = mysqli_fetch_array($query);
$id = $row["id"];
if (isset($_POST['upload'])) {
  $image = $_FILES['image']['name'];
  $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
  $image_price = mysqli_real_escape_string($db, $_POST['image_price']);
  $image_title = mysqli_real_escape_string($db, $_POST['image_title']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  if (!$image) {
    array_push($errors, "Please upload a image!");
  }
  if (empty($image_title)) {
    array_push($errors, "Put a title for your image!");
  }
  if (empty($image_price)) {
    array_push($errors, "Put a price for your image!");
  }
  if ($category == "NO") {
    array_push($errors, "Please Select a Catogery!");
  }

  if (count($errors) == 0) {
    $target = "images/" . basename($image);
    $sql = "INSERT INTO images (user_id, image, image_text, image_price, image_title, category) VALUES ('$id','$image', '$image_text', '$image_price', '$image_title','$category')";
    mysqli_query($db, $sql);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $message = "Image Uploaded Successfully!";
    }
  }
}
?>
<!DOCTYPE html>

<head>
  <title>Painting Website</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="cssimages/favicon.ico">
</head>

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
      margin-top: 30px;
    }

    .sell {
      width: 30%;
      margin-left: 35%;
      margin-bottom: 20px;

    }

    .error {
      width: 92%;
      margin: 0px auto;
      padding: 10px;
      border: 1px solid #a94442;
      color: #a94442;
      background: #f2dede;
      border-radius: 5px;
      text-align: left;
    }

    .navbar-brand {
      font-style: italic;
      font-weight: bolder;
      font-size: 20px;
      color: black;
    }

    .navbar {
      padding: 0 0 10;
    }

    .green {
      color: green;
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
                <li class="nav-item active">
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
            <form method="POST" action="" enctype="multipart/form-data" class="form">
              <h3 class="green"><?php if (isset($message)) {
                                  echo $message;
                                } ?></h3>
              <div class="form-group">
                <img src="cssimages/sell.svg" class="sell">
                <br><br><br><br><br><br><br>
              </div>
              <div class="form-group">
                <label class="price">Category of your Painting</label>
                <select class="form-control" name="category">
                  <option value="NO">Please Select a painting</option>
                  <option value="Realism">Realism</option>
                  <option value="Photorealism">Photorealism</option>
                  <option value="Painterly">Painterly</option>
                  <option value="Impressionism">Impressionism</option>
                  <option value="Abstract">Abstract</option>
                  <option value="Surrealism">Surrealism</option>
                </select>
              </div>
              <div class="form-group">
                <label class="price">Title</label>
                <input type="text" name="image_title" class="form-control" placeholder="Title of your Painting" maxlength="30">
              </div>
              <div class="form-group">
                <label class="price">Price</label>
                <input name="image_price" class="form-control" placeholder="In Rupee(₹)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="5" /></div>
              <div class="form-group">
                <label class="price">Bio (Optional)</label>
                <textarea class="form-control" id="field" cols="40" rows="4" name="image_text" maxlength="300" placeholder="Description of your painting, Maximum length is 300 Letters."></textarea>
              </div>
              <div class="form-group">
                <label class="price">Upload Painting</label>
                <input type="file" id="img" name="image" accept="image/*" class="form-control">
              </div>
              <p>Current User : <b><?php echo $user ?></b></p>
              <?php include('errors.php'); ?>

              <div class="form-group">
                <button type="submit" id="upload" value="upload" class="btn btn-primary btn-block" name="upload">Upload</button>
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