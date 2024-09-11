<?php 
	include 'connect.php';
	$limit =10;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	
	$start = ($page - 1) * $limit;
	$result = $con->query("SELECT * FROM daily  ORDER BY date desc LIMIT $start, $limit");
	$dailygrower = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $con->query("SELECT count(id) AS id FROM daily");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<title>LOG</title>
</head>
<style>
	.ui-datepicker ,.ui-widget ,.ui-widget-content ,.ui-helper-clearfix ,.ui-corner-all{
		z-index: 1;
		background-color: white;
		border:1px solid black;
	}
	a {
		text-decoration:none;
		color:black;
	}

	
	.pagination{
		justify-content: center;
		margin-top:0.5em;
	}

	li {
		margin: 0 1em;
	}
	
	form{
		padding:1em 1em;
	}
	

	@media only screen and (max-width:450px){
		.container{
			-webkit-box-shadow:0;
			width:100%;
		}
		li {
			margin: 0 5px;
		}

		th,td{
			text-align:center;
			font-size:16px;
			width:fit-content;
			margin:0 4px;
		}

		form{
			margin-bottom:1em;
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
									<form method='post' action ='export.php'>
				<!-- Datepicker -->
                <input type='text' class='datepicker' placeholder="From date" name="from_date" id='from_date' readonly>
                <input type='text' class='datepicker' placeholder="To date" name="to_date" id='to_date' readonly>
				<div class="header-item">
                    <span  class='datepicker'>ห้อง</span>
                    <select class="header-form-input" id="" name="room">
					<option value=""></option>
                        <?php 
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

                <!-- Export button -->
                <input type='submit' value='Export' name='Export'>
			</form>
		</div>
		<div  style="height: 600px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered" style="height: 600px; overflow-y: auto;">
	    	    	<thead>
	    	            <tr>
	    	                <th>date</th>
	    	                <th>ห้อง</th>
	    	                <th>ชื่อ</th>
	    	                <th>ค่าph</th>
							<th>ค่าec</th>
	    	                <th>ปุ๋ยA</th>
	    	                <th>ปุ๋ยB</th>
	    	                <th>ค่าความชื้น</th>
							<th>ค่าแสง</th>
							<th>อุณหภมิ</th>
	    	                <th>น้ำหนักใบ</th>
	    	          	</tr>
	    	      	</thead>
	    	    	<tbody>
	    	    		<?php foreach($dailygrower as $daily) :  ?>
			        		<tr>
			        			<td><?= $daily['date']; ?></td>
			        			<td><?= $daily['room']; ?></td>
			        			<td><?= $daily['name']; ?></td>
			        			<td><?= $daily['ph']; ?></td>
								<td><?= $daily['ec']; ?></td>
								<td><?= $daily['ferta']; ?></td>
								<td><?= $daily['fertb']; ?></td>
								<td><?= $daily['humidity']; ?></td>
								<td><?= $daily['light']; ?></td>
								<td><?= $daily['temp']; ?></td>
								<td><?= $daily['leaf']; ?></td>
								<td><a href="JavaScript:if(confirm('ยืนยันการลบ?')==true){window.location='del.php?id=<?php echo $daily["id"];?>';}" class="deleteStudentBtn btn btn-danger btn-sm">Delete</a></td>
			        		</tr>
	    	    		<?php endforeach; ?>
	    	    	</tbody>
      		</table>
		</div>	
		<!-- page number -->
		<div class="container-well" >
			<div class="row">
				<div class="row">
					<nav aria-labe="Page navigation">
						<ul class="pagination">
						<li>
								<?php
								if($page>1){ echo "<a href='log.php?page=".($page-1)."' class='btn btn-primary' class='h-100 d-flex align-items-center justify-content-center'>Previous</a>";}
							
							?>
							</li>
							<?php for($i =1; $i<= $pages-1;$i++) :?>
						
							<?php endfor; ?>
							<?php
							 echo "<a class='text-center' class='font-weight-bold' class='h-100 d-flex align-items-center justify-content-center'>$page</a>";
							?>
							</li>
							<li>
							<?php
								if($i>$page)
								{
								echo "<a href='log.php?page=".($page+1)."' class='btn btn-primary' class='h-100 d-flex align-items-center justify-content-center'>Next</a>";
								}
							
							?>
							</li>
						</ul>
							
					</nav>
				</div>
			</div>
		</div>


<script type="text/javascript">
$(document).ready(function(){
	$("#limit-records").change(function(){
		$('form').submit();
		})})
</script>
<script type='text/javascript' >
$(document).ready(function(){
	// From datepicker
	$("#from_date").datepicker({
		dateFormat: 'yy-mm-dd',changeYear: true,
		onSelect: function (selected) {
			var dt = new Date(selected);
			dt.setDate(dt.getDate() + 1);
			$("#to_date").datepicker("option", "minDate", dt);
		}
	});
	// To datepicker
	$("#to_date").datepicker({
		dateFormat: 'yy-mm-dd',changeYear: true,
		onSelect: function (selected) {
			var dt = new Date(selected);
			dt.setDate(dt.getDate() - 1);
			$("#from_date").datepicker("option", "maxDate", dt);
		}
	});
	});
	
</script>


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