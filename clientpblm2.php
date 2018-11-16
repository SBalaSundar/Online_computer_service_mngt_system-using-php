<?php include('dbconn.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Client</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>
<body>
    <?php include 'functions.php';?>
<?php include('nav-bar.php'); ?>
    <br><br><br>
<div class="container">
	<h1 class="page-header text-center">View Problems</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Posted Date</th>
			<th>Device</th>
			<th>Description</th>
			<th>Details</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from problem order by Problem_id";
				$query=$db->query($sql);
				while($row=$query->fetch_array()){
					echo '
					<tr>
						<td>';echo date('M d, Y h:i A', strtotime($row['time'])); echo '</td>
						<td>';echo $row['Device']; echo '</td>
						<td>';echo $row['Description']; echo '</td>
						<td><a href="#details';echo $row['Problem_id'];echo'" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>';
							include('problem_view_modal.php');
						echo '</td>
					</tr>';

				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>