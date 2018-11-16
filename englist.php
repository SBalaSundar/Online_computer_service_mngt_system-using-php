<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include 'functions.php';
include 'dbconn.php';
$q = intval($_GET['q']);
$eng="";
$ename="";
if($q==1){$sql = "select eng_id from special where `Specialization`='CCTV'";}
elseif ($q==2){$sql= "select eng_id from special where `Specialization`='Computer Hardware'";}
elseif ($q==3){$sql= "select eng_id from special where `Specialization`='Computer Software'";}
elseif ($q==4){$sql= "select eng_id from special where `Specialization`='Mobile Phones'";}
elseif ($q==5){$sql= "select eng_id from special where `Specialization`='Electricals'";}
elseif ($q==6){$sql= "select eng_id from special where `Specialization`='Electronics'";}?>
<p><select name="engineer" id="eng">
<option value="">Select Engineer</option>
<?php
if(count(fetchNot($sql))>0){
    foreach(fetchNot($sql) as $i){  
		$eng = $i['eng_id'];
		$sqlq = "select * from engineer where engid='$eng'";
		if($res = mysqli_query($db,$sqlq)){
			while($row = mysqli_fetch_array($res)){
				$ename = $row['name'];
				?>
				<option value="<?php echo $eng; ?>"><?php echo $ename; ?></option>
<?php
			}
		}
 }} ?>
</select></p>
<input type="text" name="desc" placeholder="Description" required />
<input type="submit" name="Post" value="Post Problem" />	  
</body>
</html>
