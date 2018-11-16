<?php
 class ServiceEng{
 	private $mysqli;
 	private $instance;
public function __construct() {
		$this->mysqli = new mysqli('localhost','root','','onlineservice');
		if(mysqli_connect_error()) {trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),E_USER_ERROR);}
	}
public function getConnection() {return $this->mysqli;}
public function getInstance() {
		if(!self::$instance) { /** If no instance then make one*/ self::$instance = new self();	}
		return self::$instance;}
/*public function createTable($tname) {
    $sql = "CREATE TABLE $tname(day VARCHAR(3),hron VARCHAR(25),hrtw VARCHAR(25),hrth VARCHAR(25),hrfo VARCHAR(25),hrfi VARCHAR(25),hrsi VARCHAR(25),hrse VARCHAR(25),hrei VARCHAR(25))";
	if($sql = mysqli_query($this->mysqli,$sql)){return true;}
	else {return false;}	
	}*/
public function insertEngineer($engid,$name,$street,$city,$pincode,$contactno,$photo,$gender){
	$sql = "SELECT engid from engineer where engid='".$engid."'"; 
	$chk = mysqli_query($this->mysqli,$sql);
	$uid = mysqli_fetch_array($chk);
	if($uid['engid']==$engid){return false;}
	else {
	$sql = "INSERT INTO engineer VALUES('".$engid."','".$name."','".$street."','".$city."','".$pincode."','".$contactno."','".$photo."','".$gender."')";
	$res = mysqli_query($this->mysqli,$sql);
	if($res){return true;}
	else{return mysqli_error($this->mysqli);}
	}
}
public function updateEngineer($enid,$field,$ndata){
	$sql = "UPDATE engineer SET $field = '$ndata' where engid = '$enid'";
	$res = mysqli_query($this->mysqli,$sql);
	return $res;
	//if(!$res){return mysqli_error($this->mysqli);}
	}
public function deleteEngineer($enid){
	$sql = "DELETE * FROM engineer where $enid = '$enid'";
	$res = mysqli_query($this->mysqli,$sql);
	if($res){return true;}
	else {return false;}
}
/*public function viewPersonal($tname){
    $sql = "select * from $tname";
    $res = mysqli_query($this->mysqli,$sql);
    if($res){return true;}
    else {return false;}
}*/
public function addUser($uid,$pass,$type){
	$sql = "INSERT INTO login VALUES('".$uid."','".$pass."','".$type."')";
	$res = mysqli_query($this->mysqli,$sql);
	if($res){return true;}
	else{return false;}
}
public function notifyEngineer($engid) {
    $sql = "select * from problems where pstatus='uncnfrmd' AND engid='$engid'" ;
    $res = mysqli_execute($this->mysqli,$sql);
    if($res){$arr = mysqli_fetch_array($res);
        if($arr){return $arr;}
        else{return 0;}
    }
       else{return -1;}
}
public function changeStatus($engid,$status){
    $sql = "update table status set status=$status where engid=$engid";
    $res = mysqli_query($this->mysqli, $sql);
    if($res){return true;}
    else{return false;}
}
public function jobDetails($pid,$action){
    $sql = "update table problem set status=$action where pid=$pid";
    $res = mysqli_query($this->mysqli, $sql);
    if($res){return true;}
    else{return false;}
}
public function viewProblem($field, $data){
    $sql = "select * from problem where $field=$data";
    $res = mysqli_query($this->mysqli, $sql);
    if($res){$arr = mysqli_fetch_array($res);
        if($arr){return TRUE;}
        else {    return FALSE;} }
}
public function getViewCat(){
    $sql = "select * from viewbycat";
    $res = mysqli_query($this->mysqli, $sql);
    $arr = mysqli_fetch_array($res);
    return arr;
}
public function Specialization($engid,$special){
	$sql = "INSERT INTO special VALUES('".$engid."','".$special."')";
	$res = mysqli_query($this->mysqli,$sql);
	if($res){return true;}
	else{return false;}
}
}