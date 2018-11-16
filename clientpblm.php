<?php $res1='';
$flag = 0;?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
    align: center;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
tr:nth-child(odd) {
    background-color: #e6f2ff;
}
select {
        width: 150px;
        margin: 10px;
		color:#aaa;
    }
    select:focus {
        min-width: 150px;
        width: auto;
    } 
	option:not(first-child) {
        color: #000;
    }
</style>
<?php require_once 'header.php'; ?>
</head>
<body>
    <?php    require_once 'nav-bar.php'; ?>
<br><br><br><h3> View Problems </h3>
<form method="POST">
<select name="viewcategory">
    <option value="nac">Not Accepted</option>
    <option value="ac">Accepted</option>
    <option value="nat">Not Attended</option>
    <option value="at">Attended</option>
</select>
<button type="submit" name="select1"><b>Select</b></button>
<?php
if(isset($_POST['select1'])){
    $selected1 = $_POST['viewcategory'];
    $usrid=$_SESSION['sessid'];
    $sql="";
    if($selected1 == 'nat'){
    $sql="select * from problem where Status='Not Attended' and Customer_id='$usrid'";
    }
$res1 = mysqli_query($db,$sql);  
?>
<?php
echo'<table align="center"> <th>ProblemId</th><th>ProblemType</th><th>Description</th>
               <th>Acceptance</th><th>ProblemStatus</th>';
while ($row = mysqli_fetch_array($res1)) {
	echo '<tbody><tr>';?>
        <td><a href="view_prob.php?id=<?php echo $row['Problem_id'] ?>"><?php echo $row['Problem_id'];?></a></td>
<?php	echo'<td>' . $row['Problem_type'] . '</td>
	<td>' . $row['Description'] . '</td>
	<td>' . $row['Acceptance'] . '</td>
	<td>' . $row['Status'] . '</td>
</tr>';
}
}
else{
  $clid=$_SESSION['sessid'];
echo'<table align="center"> <th>ProblemId</th><th>ProblemType</th><th>Description</th>
               <th>Acceptance</th><th>ProblemStatus</th>';
$usrid=$_SESSION['sessid'];
           $sql3 = "Select * from problem where Customer_id='$usrid'";
           $res1 = mysqli_query($db, $sql3);
      if($flag==0){
        while ($row = mysqli_fetch_array($res1)) {
	echo '<tbody><tr>';?>
	<td><a href="view_prob.php?id=<?php echo $row['Problem_id'] ?>"><?php echo $row['Problem_id'];?></a></td>
<?php
	echo '<td>' . $row['Problem_type'] . '</td>
	<td>' . $row['Description'] . '</td>
	<td>' . $row['Acceptance'] . '</td>
	<td>' . $row['Status'] . '</td>
</tr>';
    }
      }
}
?>
</tbody>
 </table>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php require 'ServiceEngineer.php';
$eng = new ServiceEng();
?>
