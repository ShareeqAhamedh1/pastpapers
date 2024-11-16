<?php
  include 'conn.php';

  $sc_id=$_REQUEST['sc_id'];
  $desc=$_REQUEST['desc'];
  $customerName=$_REQUEST['customerName'];
  $service=$_REQUEST['service'];
  $date=$_REQUEST['date'];


  $sqlService="SELECT * FROM tbl_sc_services WHERE sc_s_id='$service'";
$rsService=$conn->query($sqlService);

    if($rsService->num_rows==1){
        $rowService=$rsService->fetch_assoc();
        $serviceName=$rowService['s_name'];
    }

    if($sc_id != "" && $customerName !="" && $date != ""){

    

$sql="INSERT INTO tbl_reviews(rev_name,rev_des,services,date,sc_id) 
      VALUES ('$customerName',
              '$desc',
              '$serviceName',
              '$date',
              '$sc_id')";
$rs=$conn->query($sql);
    

if($rs > 0){
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