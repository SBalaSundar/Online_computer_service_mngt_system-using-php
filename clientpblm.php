<?php
$db = mysqli_connect('localhost', 'root', '', 'onlineservice');
session_start();
if($usrid=$_SESSION['sessid']){
?> 
<?php    include 'header.php';?>
<body bgcolor="aabbcc">
<?php    include 'nav-bar.php';?>
    <br/><br/><br/>
<h3> View Problems </h3>
<form method="POST">
<select name="viewcategory">
<?php
//$viewby = $eng->getViewCat();
$sqlq = "select * from viewbycat";
$res = mysqli_query($db, $sqlq);
while ($tables = mysqli_fetch_array($res)) {
    echo '<option value="' . $tables['cat_id'] . '">' . $tables['cat_name'] .
        '</option>';
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
?>
</select>
<button type="submit" name="select1"><b>Select</b></button>
<?php
if(isset($_POST['select1'])){
    $selected1 = $_POST['viewcategory'];
    $_SESSION['selectedprob'] = $selected1;
    $sql="select $selected1 from problem";
    $res1 = mysqli_query($db,$sql);
    echo '<select name="listproblem">';
    while($fields = mysqli_fetch_array($res1)){
    echo '<option value="' . $fields[$selected1] . '">'. $fields[$selected1].'</option>';}
echo '</select>
<button name="select2" type="submit"><b>Select</b></button>';
}
       if(isset($_POST['select2'])){
           $sprob = $_POST['listproblem'];
           $selected1 = $_SESSION['selectedprob'];
           $sql3 = "Select * from problem where $selected1='$sprob'";
           $res1 = mysqli_query($db, $sql3); ?>
           <table class="table table-striped table-bordered" align="center" border="2" cellpadding="7"> <th>ProblemId</th><th>CustomerID</th><th>DeviceType</th><th>ProblemType</th><th>Description</th>
               <th>Acceptance</th><th>ProblemStatus</th>
        <?php while ($row = mysqli_fetch_array($res1)) { ?>
	<tbody><tr>
                <td><a href="view_prob.php?id=<?php echo $row['Problem_id'] ?>"><?php echo $row['Problem_id'];?></a></td>
                <td><?php echo $row['Customer_id'];?></td>
                <td><?php echo $row['Device'];?></td>
                <td><?php echo $row['Problem_type'];?></td>
                <td><?php echo $row['Description'];?></td>
                <td><?php echo $row['Acceptance'];?></td>
                <td><?php echo $row['Status'];?></td>
</tr>
<?php
    }
    ?>
 </tbody>
 </table>
 <?php
    }
}
else{
    echo "<script type='text/javascript'>alert('Un authorized Access')</script>";
}
?>
</form>
</body>
</html>