<?php
include 'connect.php';

$ID = $_GET["delete_id"];
$sql = "DELETE FROM room
        WHERE id = '".$ID."' ";
if (mysqli_query($con, $sql)) {
    echo "<script type='text/javascript'>";
    echo "alert('Record deleted successfully');";
    echo "window.location = 'logroom.php'; ";
    echo "</script>";
} else {
    echo "Error deleting record: " . mysqli_error($con);
    
}
mysqli_close($con);
?>