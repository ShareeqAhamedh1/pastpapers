
<?php
  include 'conn.php';


$sc_id=$_REQUEST['sc_id'];
$sc_s_id=$_REQUEST['sc_s_id'];

$sqlSearch="SELECT * FROM tbl_added_services WHERE sc_id='$sc_id' AND sc_s_id='$sc_s_id'";
$rsSearch=$conn->query($sqlSearch);

if($rsSearch->num_rows==0){

    
$sql="INSERT INTO tbl_added_services (sc_id,sc_s_id) VALUES('$sc_id','$sc_s_id')";
$rs=$conn->query($sql);

if($rs>0){
    
    echo 200;
    exit();
}else{
    echo 300;
    exit();
}
}else{

    echo 202;
    exit();


}
?>