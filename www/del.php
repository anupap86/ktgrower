<?php
include "connect.php";
ini_set('display_errors', 1);
error_reporting(~0);




$ID = $_GET["id"];
$sql = "DELETE FROM daily
        WHERE id = '".$ID."' ";

$query = mysqli_query($con,$sql);

if(mysqli_affected_rows($con)) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'log.php'; ";
    echo "</script>";
}

mysqli_close($con);
?>

