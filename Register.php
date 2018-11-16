<?php
require 'ServiceEngineer.php';
if(isset($_POST['Register'])){
 if($_POST['pass']!=$_POST['cnfpass']){echo "<script type='text/javascript'>alert('Password and Confirm password did not match')</script>";}
  else {
      $location="";
  $engineer = new ServiceEng();
  $target_dir = "client/images/";
  $target_dir1 = "engineer/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file1 = $target_dir1 . basename($_FILES["fileToUpload"]["name"]);
$fileinfo=PATHINFO($_FILES["fileToUpload"]["name"]);
$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"client/images/" . $newFilename);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"engineer/images/" . $newFilename);
	$location="images/" . $newFilename;
 if($_POST['users']=="1"){
     $query = $engineer->insertEngineer($_POST['email'],$_POST['username'],$_POST['street'],$_POST['city'],$_POST['pincode'],$_POST['contactno'],$location,$_POST['gender']);
     $query1 = $engineer->Specialization($_POST['email'], $_POST['special']);
 }
 $query = $engineer->insertEngineer($_POST['email'],$_POST['username'],$_POST['street'],$_POST['city'],$_POST['pincode'],$_POST['contactno'],$location,$_POST['gender']);
 if($query==true && $query1==true) {
	 $user=$engineer->addUser($_POST['email'],$_POST['pass'],$_POST['list']);
	 if(!$user){echo "<script type='text/javascript'>alert('User account not created')</script>";}
	 echo "<script type='text/javascript'>alert('Inserted Successfully')</script>";
 header ('location:index.php');}
 elseif($query==false) {echo "<script type='text/javascript'>alert('You Have Already Registered, Please try login')</script>"; 
 header ('location:index.php');
 }
 else {echo "<script type='text/javascript'>alert('Sorry! something went wrong')</script>";}
 }
}
?>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="img/gear2.gif" />
  <title>Engineer Registration</title>
<style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
*:focus {
  outline: none;
}

body {
  margin: 0;
  padding: 0;
  font-size: 16px;
  color: #222;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
}

#login-box {
  position: relative;
  margin: 5% auto;
  width: 600px;
  height: 800px;
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
  width: 300px;
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

.or {
  position: absolute;
  top: 180px;
  left: 280px;
  width: 40px;
  height: 40px;
  background: #DDD;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  line-height: 40px;
  text-align: center;
}

.right {
  position: absolute;
  top: 0;
  right: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
  background: url('https://goo.gl/YbktSj');
  background-size: cover;
  background-position: center;
  border-radius: 0 2px 2px 0;
}

.right .loginwith {
  display: block;
  margin-bottom: 40px;
  font-size: 28px;
  color: #FFF;
  text-align: center;
}

button.social-signin {
  margin-bottom: 20px;
  width: 220px;
  height: 36px;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  transition: 0.2s ease;
  cursor: pointer;
}

button.social-signin:hover,
button.social-signin:focus {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin:active {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin.facebook {
  background: #32508E;
}

button.social-signin.twitter {
  background: #55ACEE;
}

button.social-signin.google {
  background: #DD4B39;
}
    </style>

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
  xmlhttp.open("GET","special.php?q="+str,true);
  xmlhttp.send();
}
</script>

</head>

<body translate="no" background="regback.png">
<form method="POST" enctype="multipart/form-data">

  <div id="login-box">
  <div class="left">
    <h1>Sign up</h1>
    
    <input type="text" name="username" placeholder="Yourname" required />
    <input type="text" name="email" placeholder="E-mail" required />
    <input type="password" name="pass" placeholder="Password" required />
    <input type="password" name="cnfpass" placeholder="Confirm Password" required />
    <p>Purpose of Account<select name="users" onchange="showUser(this.value)">
	<option value="0">I want to...</option>
	<option value="1">Work</option>
	<option value="2">Hire</option>
            </select></p>
            <div id="txtHint"><P></P>
	</div>
    Gender :<select name="gender" class="colors">
	<option value="">I am....</option>
	<option value="male">male</option>
	<option value="female">female</option>
        </select>
    <p><input type="file" name="fileToUpload" id="fileToUpload"></p>
    <input type="text" name="street" placeholder="street" required />
    <input type="text" name="city" placeholder="City" required />
    <input type="text" name="pincode" placeholder="pincode" required />
    <input type="text" name="contactno" placeholder="contactno" required />
    <input type="submit" name="Register" value="Sign me up" /><br>
	<br>	
	<a href="index.php">Already a member?</a>
  </div>
  
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button>
	<br><br><br><br><br><br>
	<a href="index.php">Forget your Password?</a>
  </div>
  <div class="or">OR</div>
</div>  
</form>
</body>
</html>