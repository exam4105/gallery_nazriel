<?php
$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM foto WHERE FotoID='$id'");

header("location:?url=home");
