<?php

include "dbConfig.php";

$id = $_GET['id'];

$del = mysqli_query($connection, "DELETE from images WHERE id = '$id'");

if ($del) {
    mysqli_close($db);
    header("location:mypaintings.php");
    exit;
} else {
    echo "Error deleting record";
}
