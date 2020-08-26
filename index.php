<?php
  include_once "includes/dbh.inc.php";
  

  //check if is post
  if(isset($_POST['userName']) &&isset( $_POST['passWord'])&& isset($_POST['eMail'])&& isset($_POST['birthDay'])){
    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    //$eMail =  $_POST['eMail'];
    //$birthDay =$_POST['birthDay'];
    $response = array();
  }



  $query = "select * from usert where userName = ? and passWord = ?";

  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $query)){
    echo "err!!! prepare wrong";
  }else {
    mysqli_stmt_bind_param($stmt,"ss",$userName, $passWord);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_store_result($stmt);
    
    if(mysqli_stmt_num_rows($stmt) ){
      while(mysqli_stmt_fetch($stmt)){
        printf("%s, %s", $userName,$passWord);
      }      
      echo "has value";
    }else {
      echo "NO value";
    }
    echo "finish";
  }
 ?>
