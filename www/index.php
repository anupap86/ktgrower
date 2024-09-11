<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Grower</title>
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

    <form action="process.php" method="post">
        <div class="header">
            <div class="header-container">
                <div class="header-item">
                    <span class="header-form-text">วันที่</span>
                    <input class="header-form-input" type="date" name="date" id="date">
                </div>
                <div class="header-item">
                    <span class="header-form-text">ห้อง</span>
                    <select class="header-form-input" id="" name="room">
                        <?php 
                        include 'connect.php' ;
                        $sql = "SELECT * FROM room ORDER BY rooma asc";
                        $droproom = mysqli_query($con,$sql);
                        while ($dropdownroom = mysqli_fetch_array(
                            $droproom,MYSQLI_ASSOC)):; 
                    ?>
                    <option value="<?php echo $dropdownroom["rooma"];
                    ?>">
                        <?php echo $dropdownroom["rooma"];
                        ?>
                    </option>
                <?php 
                    endwhile; 
    
                ?>
                    </select>
                </div>  
                <div class="header-item">
                    <span class="header-form-text">ชื่อ⠀</span>
                    <input class="header-form-input" type="" name="name" placeholder="name" required>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="item">
                <span class="form-text"> ค่าpH</span>
                <input class="form-input" type="number" step="any" name="ph" placeholder="" >
            </div>
            <div class="item">
                <span class="form-text">ค่าEC(mS/cm)</span>
                <input class="form-input" type="number" step="any" name="ec" placeholder="mS/cm" >
            </div>
            <div class="item">
                <span class="form-text">ปุ๋ย A(ml)</span>
                <input class="form-input" type="number" step="any" name="ferta" placeholder="ml" ><span>
                
            </div>
            <div class="item">
                <span class="form-text">ปุ๋ย B(ml)</span>
                <input class="form-input" type="number" step="any" name="fertb" placeholder="ml" >
            </div>
            <div class="item">
                <span class="form-text">ความชื้น(%)</span>
                <input class="form-input" type="number" step="any" name="humudity" placeholder="%" >
            </div>
            <div class="item">
                <span class="form-text">ค่าแสง(lux)</span>
                <input class="form-input" type="number" step="any" name="light" placeholder="lux" >
            </div>
            <div class="item">
                <span class="form-text">อุณหภูมิ(C)</span>
                <input class="form-input" type="number" step="any" name="temp" placeholder="C" >
            </div>
            <div class="item">
                <span class="form-text">น้ำหนักใบ(kg)</span>
                <input class="form-input" type="number" step="any" name="leaf" placeholder="kg" >
            </div>
            <div class="btn_combo">
                <button name="button">
                    ตกลง
                </button>
                <button type="reset">
                    ยกเลิก
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