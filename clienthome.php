<?php
if(!isset($_SESSION['sessid'])){
session_start();
}
include 'header.php';?>
  <body>
<?php include 'nav-bar.php';?>

      <?php
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
      echo '</tbody></table>';
}
?>
  </body>
</html>
