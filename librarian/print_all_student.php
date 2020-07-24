<?php 
	require_once '../db.php';
	$sql = "select * from students";
	$result = $db->query($sql);
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Print All Student</title>
	
	<style type="text/css">
		body{
			margin: 0;
			font-family: kalpurush;

		}
		.print_area{
			width: 750;
			height: 1050;
			margin: 0 auto;
			box-sizing: border-box;
			page-break-after: always;
		}
		.page-info,.header{
			text-align: center;
		}
		.header h2,h3,h4{
			margin: 0;
		}
		.data-info{}
		.data-info table{
			width: 100%;
			border-collapse: collapse;
		}
		.data-info table tr,
		.data-info table td{
			border: 1px solid #555;
			padding: 5px;
			line-height: 1em;

		}
	</style>
</head>
<body onload="window.print()">
	<?php 
		$sl =1 ;
		$page = 1;
		$total = mysqli_num_rows($result);
		$par_page = 2;
		while ($row=$result->fetch_assoc()) {
			if ($sl % $par_page == 1) {
				echo page_header();
			}

		 ?>
			
				<tr>
					<th><?= $sl ?></th>
					<th><?= $row['id']?></th>
					<th><?= $row['name']?></th>
					<th><?= $row['roll']?></th>
					<th><?= $row['reg']?></th>
					<th><?= $row['email']?></th>
					<th><?= $row['phone']?></th>
			

				</tr>
	<?php
	if ($sl % $par_page == 0 || $total==$par_page) {
				echo page_footer($page++);
			}
	$sl ++ ;	
} ?>

			
	

</body>
</html>
<?php 
 function page_header(){
 	$data = '	<div class="print_area">
		<div class="header">
			<h2>Mainamoti iT</h2>
			<h3>Cantonment,Comilla</h3>
			<h4>Contact:- 01521231285</h4>
		</div>
		<div class="data-info">
			<table>
				<tr>
					<th>Sl No</th>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Student Roll</th>
					<th>Student Reg</th>
					<th>Student Email</th>
					<th>Student Phone</th>
				</tr>';
 	return $data;
 }
  function page_footer($page){
 	$data = '		</table>
			<div class="page-info">Page :- '.$page.'	</div>
		</div>
	</div>';
 	return $data;
 }


?>