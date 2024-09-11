<?php
require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="style copy.css">
    <title>Room</title>
</head>

<style>
    *{
        font-size:large;
    }

    .box-container{
        margin:0 10em;
    }

    .delroom{
        background-color:#c30000;
    }


@media only screen and (max-width:450px){
    .box-container{
        margin:0;
        height: 600px; 
        overflow-y: auto;
        margin-top:1em;
    }
    .delroom{
        font-size:12px;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: center;
        text-align: center;
        border-top: 1px solid #ddd;
    }
}
</style>

<body>
    <div class="sidebar">
    <a href="index.php">หน้าหลัก</a>
        <a href="calendar.php">ปฏิทิน</a>
        <a href="log.php">ประวัติ</a>
        <a href="logroom.php">ห้อง</a>
    </div>

    <div class="overlay" id="Nav">
        <div class="sidenav-content">
        <a href="index.php">หน้าหลัก</a>
        <a href="calendar.php">ปฏิทิน</a>
        <a href="log.php">ประวัติ</a>
        <a href="logroom.php">ห้อง</a>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
    </div>

    <div class="nav-button" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</div>
    
    <div class="box-container" style="height: 600px; overflow-y: auto;margin-top:1em;">
        <table id="" class="table table-striped table-bordered" style="height: 600px; overflow-y: auto;width: 1000px;max-width:100%;">
            <thead>
                <tr>

                    <th>ชื่อห้อง</th>
                    <td><a href = 'update.php' title = 'View Record' 
                    data-bs-toggle='tooltip'><button >เพิ่มห้อง</button></a></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `room` ORDER BY rooma asc";
                $result = mysqli_query($con,$sql);
                while($row =mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo"<td>". $row['rooma']."</td>" ;
                    echo "<td><a href = 'delroom.php?delete_id=". $row['id'] ."' title = 'View Record' 
                    data-bs-toggle='tooltip'><button class='delroom'>ลบห้อง</button></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })

    function openNav() {
        document.getElementById("Nav").style.display = "block";
    }

    function closeNav() {
        document.getElementById("Nav").style.display = "none";
    }
</script>
</html>