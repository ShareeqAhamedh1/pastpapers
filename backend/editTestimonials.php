
<?php
  include 'conn.php';


  $sc_id=$_REQUEST['sc_id'];
  $desc=$_REQUEST['desc'];
  $customerName=$_REQUEST['customerName'];
  $service=$_REQUEST['service'];
  $date=$_REQUEST['date'];
  $rev_id=$_REQUEST['rev_id'];


  $sqlService="SELECT * FROM tbl_sc_services WHERE sc_s_id='$service'";
  $rsService=$conn->query($sqlService);
  
      if($rsService->num_rows==1){
          $rowService=$rsService->fetch_assoc();
          $serviceName=$rowService['s_name'];
      }

      if($sc_id != "" && $customerName !="" && $date != ""){


$sql="UPDATE tbl_reviews SET rev_name='$customerName',rev_des='$desc',services='$serviceName',date='$date' WHERE rev_id='$rev_id'";
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