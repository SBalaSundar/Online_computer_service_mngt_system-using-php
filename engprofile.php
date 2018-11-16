<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
    float: left;
    border: 0px solid #ccc;
    background-color: #ffffff;
    width: 30%;
    height: 75px;
}
/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 10px 6px;
    width: 100%;
    border: 2;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}
/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}
/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 70%;
    border-left: none;
    height: 600px;
}
</style>
</head>
<body>
<?php include 'nav-bar.php';    
require 'ServiceEngineer.php';
$Eng = new ServiceEng();?>
     <br/><br/><br/><div class="tab">
<?php 
    $erate=0;
    $sql = "select * from engineer";
    if(count(fetchNot($sql))>0){
        foreach(fetchNot($sql) as $i){
            $erate = $Eng->eRate($i['engid']);
                    $ename = $i['name'];
                   // $street =$i['street'];
                   // $city = $i['city'];
                    if($erate==5){?>
         <button style="background: url(images/5.png);background-repeat: no-repeat;background-position: 200px 8px;" class="tablinks" onmouseover="changeColor(this)" onclick="openCity(event, '<?php echo $ename;?>')" id="defaultOpen"><?php echo $ename;?></button>
                    <?php }
                    elseif($erate==4){?>
                        <button style="background: url(images/4.png);background-repeat: no-repeat;background-position: 200px 8px;" class="tablinks" onclick="openCity(event, '<?php echo $ename;?>')" id="defaultOpen"><?php echo $ename;?></button>
                    <?php }
                    elseif($erate==3){?>
                        <button style="background: url(images/3.png);background-repeat: no-repeat;background-position: 200px 8px;" class="tablinks" onclick="openCity(event, '<?php echo $ename;?>')" id="defaultOpen"><?php echo $ename;?></button>                    
                    <?php }
                        elseif($erate=2){?>
                        <button style="background: url(images/2.png);background-repeat: no-repeat;background-position: 200px 8px;" class="tablinks" onclick="openCity(event, '<?php echo $ename;?>')" id="defaultOpen"><?php echo $ename;?></button>                    
                    <?php }
                    elseif($erate=1){?>
                        <button style="background: url(images/1.png);background-repeat: no-repeat;background-position: 200px 8px;" class="tablinks" onclick="openCity(event, '<?php echo $ename;?>')" id="defaultOpen"><?php echo $ename;?></button>
                    <?php }
                    elseif($erate<5 && $erate>4){?>
                        <button style="background: url(images/4half.png);background-repeat: no-repeat;background-position: 200px 8px;" class="tablinks" onclick="openCity(event, '<?php echo $ename;?>')" id="defaultOpen"><?php echo $ename;?></button>
                    <?php }
                    elseif($erate<4 && $erate>3){?>
                        <button style="background: url(images/3half.png);background-repeat: no-repeat;background-position: 200px 8px;" class="tablinks" onclick="openCity(event, '<?php echo $ename;?>')" id="defaultOpen"><?php echo $ename;?></button>
                    <?php } 
                    elseif($erate<3 && $erate>2){?>
                        <button style="background: url(images/2half.png);background-repeat: no-repeat;background-position: 200px 8px;" class="tablinks" onclick="openCity(event, '<?php echo $ename;?>')" id="defaultOpen"><?php echo $ename;?></button>
                    <?php }
                    elseif($erate<2 && $erate>1){?>
                        <button style="background: url(images/1half.png);background-repeat: no-repeat;background-position: 200px 8px;" class="tablinks" onclick="openCity(event, '<?php echo $ename;?>')" id="defaultOpen"><?php echo $ename;?></button>
                    <?php } ?>
<?php                        
            }
    }
?>
</div>
<?php 
    $sql1 = "select * from engineer";
    $engid="";
    include 'dbconn.php';
    if(count(fetchNot($sql1))>0){
        $special = array();
        foreach(fetchNot($sql1) as $i){
            $sql2 = "select * from special where eng_id='".$i['engid']."';";
            if(count(fetchNot($sql2))>0){
                foreach(fetchNot($sql2)as $j){
                    
            ?>
            <div id="<?php echo $i['name'];?>" class="tabcontent">
            <h3 align="center"><?php echo $i['name'];?></h3>
            <img src="<?php echo $i['photo']?>" height="200"width="150"/>
            <p><b><u>Contact Details</u></b><?php echo '<p><b>Street :</b>', $i['street'],'</p><p><b>City :</b>',$i['city'],'</p><p><b>Pincode :</b>',$i['pincode'],'</p><b><p>Contact No:</b>',$i['contactno'],'</p>';?> </p>
            <b><u>Specialization</u></b>
            <p><?php echo $j['Specialization'];?></p>
            </div>  
                <?php    }}}}?>
<script>
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

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
    function changeColor(x){
    x.style.background-color = "#ddd";
    };
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> 