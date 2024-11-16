<?php
  include 'conn.php';

  $language=$_REQUEST['language'];
  $grade=$_REQUEST['grade'];
  // $thumb=$_REQUEST['thumb'];
  $subject=$_REQUEST['subject'];

  $sqlSelect="SELECT * FROM tbl_lesson WHERE lang_id='$language' AND s_id='$subject' AND g_id='$grade'";
  $rsSelect=$conn->query($sqlSelect);

  if($rsSelect->num_rows==0){

 


$filePathThumb='../assets/img/thumbnail/';
$allowedList=array('jpg','jpeg','png','webp');
$errorLocation= '../addlessons.php';

uploadImage('thumb',$filePathThumb,$allowedList,$errorLocation);
$thumb = $GLOBALS['fileNameNew'];

$sql="INSERT INTO tbl_lesson(lang_id,s_id,g_id,thumbnail_img) 
      VALUES ('$language',
              '$subject',
              '$grade',
              '$thumb')";
$rs=$conn->query($sql);


if($rs > 0){
  $_SESSION['lesson_added_success']=true;
  header('location:../addlessons.php');
  exit();
}else{
  $_SESSION['lesson_added_error']=true;
  header('location:../addlessons.php');
  exit();
}
}else{
  $_SESSION['lesson_already_added']=true;
  header('location:../addlessons.php');
  exit();

}

 ?>