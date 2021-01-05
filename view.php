<?php

include "dbConfig.php";

$id = $_GET['id'];
$query = "SELECT from images WHERE id = '$id'";
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
                    <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">View</a>
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
