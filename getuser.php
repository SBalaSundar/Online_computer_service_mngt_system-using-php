<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include 'functions.php';
$q = intval($_GET['q']);
if($q==1){
	$sql = "select * from problem where Acceptance='Accepted'";
}
elseif($q==2){
	$sql = "select * from problem where Acceptance='Not accepted'";
	}
elseif($q==3){
     $sql = "select * from problem where Status='Attended'";
}
elseif($q==4){
     $sql = "select * from problem where Status='Not Attended'";
}
//$result = mysqli_query($con,$sql);
echo "<table align='center'>
<tr>
<td><b>Prob_id</b></td>
<td><b>Posted On</b></td>
<td><b>Problem_type</b></td>
<td><b>Description</b></td>
<td><b>Acceptance Status</b></td>
<td><b>Status</b></td>
</tr>";
if(count(fetchNot($sql))>0){
foreach(fetchNot($sql) as $row) {
    echo "<tr>";
    echo "<td>".date('M d, Y h:i A', strtotime($row['time']))."</td>";
    echo "<td>" . $row['Problem_type'] . "</td>";
    echo "<td>" . $row['Description'] . "</td>";
    echo "<td>" . $row['Acceptance'] . "</td>";
    echo "<td>" . $row['Status'] . "</td>";
    echo "</tr>";
}}
echo "</table>";
?>
</body>
</html>