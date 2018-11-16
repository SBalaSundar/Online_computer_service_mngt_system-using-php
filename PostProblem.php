<!DOCTYPE html>
<?php
session_start();
if($uid=$_SESSION['sessid']){
    require 'ServiceEngineer.php';
$Eng = new ServiceEng();
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
    $time = date('Y-m-d h:i:s');
    if($_POST['ptype']=="1"){$ptype = "CCTV";}
    elseif($_POST['ptype']=="2"){$ptype = "Computer Hardware";}
    elseif($_POST['ptype']=="3"){$ptype = "Computer Software";}
    elseif($_POST['ptype']=="4"){$ptype = "Mobile Phones";}
    elseif($_POST['ptype']=="5"){$ptype = "Electricals";}
    elseif($_POST['ptype']=="6"){$ptype = "Electronics";}
    $sql = "insert into problem values(".$ran.",'". $_POST['engineer'] ."','". $uid ."','". $ptype ."','". $_POST['desc'] ."','".$time."','Not accepted','Not Attended','NR',0,0)";
    if($res = mysqli_query($db,$sql)){
        echo "<script type='text/javascript'>alert('Problem is posted to '".$_POST['engineer']."')</script>";
        header('location: clientpblm.php');
    }
    else{
        echo "<script type='text/javascript'>alert('There is an Error Occured')</script>";
    }
    echo '<br/><br/><br/><h3>';echo $sql; echo '</h3>'; echo $time;
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
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  };
  xmlhttp.open("GET","englist.php?q="+str,true);
  xmlhttp.send();
}
</script>
<form method="POST">
  <div id="login-box">
  <div class="left">
    <h1>Enter the problem Details</h1>
        <select name="ptype" onchange="showUser(this.value)">
	<option value="">Select Problem Type</option>
	<option value="1">CCTV</option>
	<option value="2">Computer Hardware</option>
        <option value="3">Computer Software</option>
	<option value="4">Mobile Phones</option>
	<option value="5">Electricals</option>
	<option value="6">Electronics</option>
	</select>
    <div id="txtHint"><P></P></div>
<?php
            }
else{
    echo "<script type='text/javascript'>alert('Un authorized Access')</script>";
}
        ?>
  </div>
</div>
</form>
  <script>
   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>