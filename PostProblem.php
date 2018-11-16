<!DOCTYPE html>
<?php
session_start();
if($uid=$_SESSION['sessid']){
$db = mysqli_connect('localhost', 'root', '', 'onlineservice');
if(isset($_POST['Post'])){
    $ran=random_int(1,100000);
    $sql = "Select Problem_id from problem";
    $res = mysqli_query($db,$sql);
    while ($row = mysqli_fetch_array($res)) {
       if($row['Problem_id']==$ran){
           $ran=random_int(1,200000);
       }
    }
    $sql = "insert into problem values('".$ran."','". $_POST['engineer'] ."','". $uid ."','". $_POST['dtype'] ."','". $_POST['ptype'] ."','". $_POST['desc'] ."','Not accepted','Not Attended',0)";
    if($res = mysqli_query($db,$sql)){
        echo "<script type='text/javascript'>alert('Problem is posted to '".$_POST['engineer']."')</script>";
        header('location: viewproblem.php');
    }
    else{
        echo "<script type='text/javascript'>alert('There is an Error Occured')</script>";
    }
}
?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Post Problem</title>
      <link rel="stylesheet" href="css/style.css">
  <style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
*:focus {
  outline: none;
}

body {
  margin: 0;
  padding: 0;
  background: #DDD;
  font-size: 16px;
  color: #222;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
}

#login-box {
  position: relative;
  margin: 5% auto;
  width: 1000px;
  height: 630px;
  background: #FFF;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.left {
  position: absolute;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 1000px;
  height: 400px;
}

h1 {
  margin: 0 0 20px 0;
  font-weight: 300;
  font-size: 28px;
}

input[type="text"],
input[type="password"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  width: 220px;
  height: 32px;
  border: none;
  border-bottom: 1px solid #AAA;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 15px;
  transition: 0.2s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-bottom: 2px solid #16a085;
  color: #16a085;
  transition: 0.2s ease;
}

input[type="submit"] {
  margin-top: 28px;
  width: 120px;
  height: 32px;
  background: #16a085;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

input[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}
    </style>
<?php require 'header.php'; ?>
</head>
<body>
<?php    include 'nav-bar.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script  src="js/index.js"></script>
 <script>
  window.console = window.console || function(t) {};
</script>
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
<form method="POST">
  <div id="login-box">
  <div class="left">
    <h1>Enter the problem Details</h1>
    <select name="dtype">
	<option value="">Select Device Type</option>
	<option value="dpc">Desktop PC</option>
	<option value="lpt">Laptop</option>
        <option value="dvr">DVR</option>
        <option value="mdm">Modem</option>
    </select><br><br><br>
    <select name="engineer">
	<option value="">Select Engineer</option>
	<?php
            $sql1 = "select engid from engineer";
            $res = mysqli_query($db,$sql1);
            while($row = mysqli_fetch_array($res)){
                echo '<option value="'.$row['engid'].'">'.$row['engid'].'</option>';
            }
            }
else{
    echo "<script type='text/javascript'>alert('Un authorized Access')</script>";
}
        ?>
    </select><br><br><br>
    <select name="ptype">
	<option value="">Select Problem Type</option>
	<option value="hw">Hardware</option>
	<option value="sw">Software</option>
        <option value="o">Others</option>
	</select>
    <input type="text" name="desc" placeholder="Description" required />
    <input type="submit" name="Post" value="Post Problem" />
  </div>
</div>
</form>
</body>
</html>