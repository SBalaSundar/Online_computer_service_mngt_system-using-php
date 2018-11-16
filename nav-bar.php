<?php
	include("functions.php");
        if(!isset($_SESSION)) { session_start(); }
        $clid = $_SESSION['sessid'];
      ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a href="clienthome.php"> <img src="css/home.png" alt="" height="25" width="25"/></a>
        <a class="navbar-brand" href="clienthome.php">Home</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status Updates 
                <?php
                $query = "SELECT * from `problem` where `client_view_status` = 1 and `Customer_id`='$clid' order by `Problem_id` DESC";
                if(count(fetchNot($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchNot($query)); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from `problem` where `Customer_id`='$clid' order by `Problem_id` DESC";
                 if(count(fetchNot($query))>0){
                     foreach(fetchNot($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['view_status']==1){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view_prob.php?id=<?php echo $i['Problem_id'] ?>">
                <small><i><?php echo 'Your Request status gets Updated :', $i['Description'] ?></i></small><br/>
                  <?php 
                  
                if($i['Description']=='hw'){
                    echo "Hardware.";
                }else if($i['Description']=='sw'){
                    echo ucfirst($i['Customer_id'])." posted.";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                
                     ?>
            </div>
          </li>
          <li>
              <a class="nav-link" href="PostProblem.php" >Post a Problem </a>
          </li>
          <li>
              <a class="nav-link" href="clientpblm.php" >View Problem Status </a>
          </li>
          <li>
              <a class="nav-link" href="engprofile.php" >Engineer Profile</a><a></a>
          </li>
           <li></li>
		         <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Messages 
                <?php
                $query = "SELECT * from `message` where `view_status` = 0 and `to`='$clid'";
                if(count(fetchNot($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchNot($query)); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from `message` where `to`='$clid'";
				$name='';
                 if(count(fetchNot($query))>0){
                     foreach(fetchNot($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['view_status']==0){
                                echo "font-weight:bold;";
                            }
							$sql4 = "select name from engineer where engid='".$i['from']."'";
							if(count(fetchNot($sql4))>0){
                     foreach(fetchNot($sql4) as $n){
								$name = $n['name'];
							}
						}
                         ?>
                         " class="dropdown-item" href="view_prob.php?id=<?php echo $i['about'] ?>">
                <small><i><?php echo 'New Message from :', $name ?></i></small><br/>
                  <?php echo $i['msg'];                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                
                     ?>
            </div>
          </li>
          <li>
              <a class="nav-link" href="clienthome.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

