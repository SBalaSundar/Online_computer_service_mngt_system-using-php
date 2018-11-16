<?php include 'header.php';?>
<body>
<?php include 'nav-bar.php';
    require 'ServiceEngineer.php'; 
    $Engineer = new ServiceEng();
    $sql3="";
    $star="";
    $id = $_GET['id'];
    $sql = "select * from problem where `Problem_id`=$id;";
    $query ="UPDATE `problem` SET `client_view_status` = 0 WHERE `Problem_id` = $id;";
    if(count(fetchNot($sql))>0){
        foreach(fetchNot($sql) as $i){
            $prid = $i['Problem_id'];
            $time = date('M d, Y h:i A', strtotime($i['time']));
            $desc = $i['Description'];
            $acc = $i['Acceptance'];
            $engid = $i['Eng_id'];
            $cid = $i['Customer_id'];
        }
    }
    $sql2 = "select * from engineer where `engid`='$engid'";
    if(count(fetchNot($sql2))>0){
        foreach(fetchNot($sql2) as $i){
            $cname = $i['name'];
            $street = $i['street'];
            $city = $i['city'];
            $pin = $i['pincode'];
            $phno = $i['contactno'];
            }
    }
            ?>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Problem')">About the Post</button>
  <button class="tablinks" onclick="openCity(event, 'Client')">About the Engineer</button>
  <button class="tablinks" onclick="openCity(event, 'Discussion')">Discussion</button>
  </div>

<div id="Problem" class="tabcontent" >
    <form method="POST">
  <h3>Problem Details</h3>
    <h3>Problem_id : <?php echo $prid ?></h3>
    <p>Posted On : <?php echo $time ?></p>
    <p>Problem Description : <?php echo $desc ?></p>
    <p>Job Status : <?php echo $acc ?> by the Engineer</p>
<?php
performQuery($query);?>
<a>Give rating about the service of the engineer</a>
<div class="rating">
  <label>
    <input type="radio" name="stars" value="1" onclick="eRate();"/>
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="stars" value="2" />
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="stars" value="3" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>   
  </label>
  <label>
    <input type="radio" name="stars" value="4" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="stars" value="5" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
    
</div>
<p><a><button name="rate">Submit Rating</button></a>
<a href="enghome.php"><button name="back">Back</button></a></p>
<?php if(isset($_POST['rate'])){
    $star = $_POST['stars'];
	if($star==1){$star=20;}
	elseif($star==2){$star=40;}
	elseif($star==3){$star=60;}
	elseif($star==4){$star=80;}
	elseif($star==5){$star=100;}
	$sqlr = "update problem set rating=$star where Problem_id=$prid";
	performQuery($sqlr);
	}?>
</form>
</div>

<div id="Client" class="tabcontent">
  <h3>Engineer Details</h3>
  <h3>Name : <?php echo $cname;
    $rate = $Engineer->eRate($engid);
    if($rate==5){
        echo "<img src='images/5.png'/>";
    }
    elseif($rate==4){
        echo "<img src='images/4.png'/>";
    }
  ?></h3>
    <p>Mail_id : <?php echo $engid ?></p>
    <p>Address : <?php echo $street,',',$city,',',$pin ?></p>
    <p>Contact_number : <?php echo $phno ?></p>
    <p><button name="discuss" onclick="openCity(event, 'Discussion')">Start Conversation</button>
    </div>
<div id="Discussion" class="tabcontent">
    <h1> Discussions</h1>
    <?php   $sql5 = "select * from message where view_status=0 and `about`=$prid";
            if(count(fetchNot($sql5))>0){
                $sql4 = "select * from message where about='$prid'";
                if(count(fetchNot($sql4))>0){
                    foreach(fetchNot($sql4) as $m){
						if($m['from']==$cid){
								echo '<p><b>You : </b>',$m['msg'],'</p>';
						}
						elseif($m['from']==$engid){
                        echo '<p><b>',$cname ,'</b>',' : ', $m['msg'],'</p>'; 
						}
					}
                }  
            }
			
?>  
    <form method="POST">
    <textarea style="resize: none;" rows="3" cols="40" name="reply" placeholder="Type your Reply Here" required autofocus></textarea>
    <button type="submit" name="submit">Send</button></form>
<?php if(isset($_POST['submit'])){
session_start();
$cid=$_SESSION['sessid'];
$msg = $_POST['reply'];
$time = date('Y-m-d h:i:s');
$sql3 = "insert into message values('$cid','$engid','$prid','$msg','$time',0);";
if(performQuery($sql3)){
echo "<script type='text/javascript'>alert('Sent Successfully')</script>";
header("location:enghome.php");
}
else {
     echo "<script type='text/javascript'>alert('OOPs! Something went Wrong')</script>";
    }
}?>
</div>
<script type="text/javascript">
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<script>
$( "input:radio" ).on( "click", function() {
  $( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
});
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>