
<?php
  include 'conn.php';


$serviceName=$_REQUEST['serviceName'];
$servicePrice=$_REQUEST['servicePrice'];

$sql="INSERT INTO tbl_sc_services (s_name,s_price_range) VALUES('$serviceName','$servicePrice')";
$rs=$conn->query($sql);

if($rs>0){
    
    echo 200;
    exit();
}else{
    echo 300;
    exit();
}


?>