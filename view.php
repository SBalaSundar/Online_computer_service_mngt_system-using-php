<h1>Notifications</h1>

<?php
    
    include("functions.php");

    $id = $_GET['id'];

    $query ="UPDATE `problem` SET `view_status` = 1 WHERE `Problem_id` = $id;";
    performQuery($query);

    $query = "SELECT * from `problem` where `Problem_id` = '$id';";
    if(count(fetchNot($query))>0){
        foreach(fetchNot($query) as $i){
            if($i['Problem_type']=='sw'){
                echo ucfirst($i['Customer_id'])." posted a Software job. <br/>".$i['Description'];
            }else{
                echo "Hardware post.<br/>".$i['Description'],$i['Customer_id'] ;
            }
        }
    }
    
?><br/>
<a href="enghome.php">Back</a>