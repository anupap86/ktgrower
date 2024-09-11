<?php
    require('connect.php');
    
    if (isset($_REQUEST['btn_insert'])) {
        $eman = $_REQUEST['name_room'];
        $roomg = "SELECT rooma FROM room WHERE rooma = '$eman'";
        $selroom = mysqli_query($con,$roomg);
        $countroom = mysqli_num_rows($selroom);
        if ($countroom>0) {
            echo "<script type='text/javascript'>";
            echo "window.location = 'logroom.php'; ";
            echo "alert('ชื่อห้องนี้ถูกใช้ไปแล้ว');";
            echo "</script>";
            return false;
        }
        if($eman !=""){
            $select_stmt = $con ->prepare("INSERT INTO `room`( `rooma`) VALUES ('$eman')" );
            $select_stmt ->execute();
            echo "<script type='text/javascript'>";
            echo "window.location = 'logroom.php'; ";
            echo "alert('เพิ่มห้องเรียบร้อย');";
            echo "</script>";

            $roomg = "SELECT rooma FROM room WHERE rooma = '$eman'";
            $selroom = $con->query($roomg);
            $rowoom = $selroom->fetch_assoc();
            

        }else{
        echo "<script type='text/javascript'>";
        echo "alert('กรุณากรอกชื่อห้อง');";
        echo "window.location = 'update.php'; ";
        echo "</script>";
            
            
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>สร้างห้อง</title>
</head>


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

    <form>
        
        <div class="container">
            <div class="item">
                <span class="form-text">ชื่อห้อง</span>
                <input class="form-input" type="" name="name_room" placeholder="" >
            </div>
            <div class="btn_combo">
                    <button name="btn_insert">
                        เพิ่ม
                    </button>
                    <button >
                        <a href="logroom.php" style="text-decoration:none;color:white;">
                        กลับ
                        </a>
                    </button>
            </div>
        </div>
    </form>


<script>


document.getElementById('date').value = new Date().toISOString().substring(0, 10);

function openNav() {
    document.getElementById("Nav").style.display = "block";
}

function closeNav() {
    document.getElementById("Nav").style.display = "none";
}
</script>   

</body>
</html>