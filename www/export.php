<?php
include "connect.php";
$filename = 'grower_'.time().'.csv';

// POST values
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$roomcs=$_POST['room'];
// Select query


if(isset($_POST['from_date']) && isset($_POST['to_date'])){
	$query = "SELECT * FROM daily where date between '".$from_date."' and '".$to_date."' ORDER BY date desc";
    $query = "SELECT * FROM daily where room ='$roomcs'";
}
if(empty($roomcs)){
    $query = "SELECT * FROM daily where date between '".$from_date."' and '".$to_date."' ORDER BY date desc";
}

if(empty($from_date)&&empty($to_date)){
    $query = "SELECT * FROM daily ORDER BY date desc";
}
$result = mysqli_query($con,$query);
$grower_arr = array();

// file creation
$file = fopen($filename,"w");
fputs($file, $bom = ( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
// Header row - Remove this code if you don't want a header row in the export file.
$grower_arr = array("date","ห้อง","ชื่อ","ค่าph","ค่าec","ปุ๋ยA","ปุ๋ยB","ค่าความชื้น","ค่าแสง","อุณหภูมิ","น้ำหนักใบ"); 
fputcsv($file,$grower_arr);   
while($row = mysqli_fetch_assoc($result)){
    $date = $row["date"];
    $room = $row["room"];
    $name = $row["name"];
    $ph = $row["ph"];
    $ec = $row["ec"];
    $ferta = $row["ferta"];
    $fertb = $row["fertb"];
    $humudity = $row["humidity"];
    $light = $row["light"];
    $temp = $row["temp"];
    $leaf = $row["leaf"];

    // Write to file 
    $grower_arr = array($date,$room,$name,$ph,$ec,$ferta,$fertb,$humudity,$light,$temp,$leaf);
    fputcsv($file,$grower_arr);   
}

fclose($file); 

// download
header("content-type:application/csv;charset=UTF-8");
header("Content-Disposition:attachment;filename=$filename");
header("Content-Description: File Transfer");

readfile($filename);

// deleting file
unlink($filename);
exit();
?>