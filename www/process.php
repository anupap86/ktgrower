<?php
include 'connect.php' ;
$room = $_POST["room"];
$name = $_POST["name"];
$ph = $_POST["ph"];
$ec = $_POST["ec"];
$ferta = $_POST["ferta"];
$fertb = $_POST["fertb"];
$humudity = $_POST["humudity"];
$light = $_POST["light"];
$temp = $_POST["temp"];
$leaf = $_POST["leaf"];

if(empty($ph)){
    $ph =0;
}
if(empty($ec)){
    $ec =0;
}
if(empty($ferta)){
    $ferta =0;
}
if(empty($fertb)){
    $fertb =0;
}
if(empty($humudity)){
    $humudity =0;
}
if(empty($light)){
    $light =0;
}
if(empty($temp)){
    $temp =0;
}
if(empty($leaf)){
    $leaf =0;
}

if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['button'])){
// Attempt insert query execution
    $sql = "INSERT INTO daily(id,  room, name, ph, ec, ferta, fertb, humidity, light,temp,leaf) VALUES (NULL,'$room','$name','$ph','$ec','$ferta','$fertb','$humudity','$light','$temp','$leaf')";
    if(mysqli_query($con, $sql)){
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location = 'log.php'; ";
        echo "</script>";

    } 

    else{
        echo "<script type='text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาดกรุณากรอกใหม่');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
}

}
// Close connection
mysqli_close($con);
?>
