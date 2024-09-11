<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
<title>Calendar</title>
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

<div class="container">
  
<div class="small-calendar" >
    <iframe src="https://calendar.google.com/calendar/embed?height=650&wkst=1&bgcolor=%237CB342&ctz=Asia%2FBangkok&showTitle=0&showDate=1&showNav=1&showPrint=0&showTabs=0&showCalendars=1&showTz=0&src=Y19tNjljNGs3Zm40MGsxMXQ3ZDE4aGNjaXBtNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19nODNjbTZxZTlpMHVldXBnZGZrZHNobjQxY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19vN2JqNGVtMHN0cGlnbnZvNjUwZ2RnbDJkY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y18yaTU5MXJuZG44Z2NpdGhoMzFyamx1aXBlc0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y18xcGkzbWFtM2JiNzhmdXI5MGxjOHIwaDhnY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y185ZTU3N3Zvb2xraHZrNzBnc204MDBxdm1jOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y180N2E4OW01OXE3ZWtwb2YwcnQwOWJmdTRkNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23009688&color=%23616161&color=%237CB342&color=%23F09300&color=%239E69AF&color=%23F4511E&color=%23795548" style="border:solid 1px #777" width="auto" height="650" frameborder="0" scrolling="no"></iframe>
  </div>

  <div class="big-calendar" >
    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%237CB342&ctz=Asia%2FBangkok&showTitle=0&showDate=1&showNav=1&showPrint=0&showTabs=0&showCalendars=1&showTz=0&src=Y19tNjljNGs3Zm40MGsxMXQ3ZDE4aGNjaXBtNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19nODNjbTZxZTlpMHVldXBnZGZrZHNobjQxY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19vN2JqNGVtMHN0cGlnbnZvNjUwZ2RnbDJkY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y18yaTU5MXJuZG44Z2NpdGhoMzFyamx1aXBlc0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y18xcGkzbWFtM2JiNzhmdXI5MGxjOHIwaDhnY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y185ZTU3N3Zvb2xraHZrNzBnc204MDBxdm1jOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y180N2E4OW01OXE3ZWtwb2YwcnQwOWJmdTRkNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23009688&color=%23616161&color=%237CB342&color=%23F09300&color=%239E69AF&color=%23F4511E&color=%23795548" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
  </div>


</div>
<script>
function openNav() {
    document.getElementById("Nav").style.display = "block";
}
function closeNav() {
    document.getElementById("Nav").style.display = "none";
}
</script>

</body>
</html>