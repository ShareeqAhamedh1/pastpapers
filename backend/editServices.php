
<?php
  include 'conn.php';


$serviceName=$_REQUEST['serviceName'];
$servicePrice=$_REQUEST['servicePrice'];
$sc_s_id=$_REQUEST['sc_s_id'];

$sql="UPDATE tbl_sc_services SET s_name='$serviceName',s_price_range='$servicePrice' WHERE sc_s_id='$sc_s_id'";
$rs=$conn->query($sql);

if($rs>0){
    
    echo 200;
    exit();
}else{
    echo 300;
    exit();
}


?>