<?php
  include_once "includes/dbh.inc.php";
   

  //check if is post
  if(isset($_POST['userName']) &&isset($_POST['passWord'])){
    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    $response = array();
  }



  $query = "select UID, userName, passWord, email from usert where userName = ? and passWord = ?";

  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $query)){
    echo "err!!! prepare wrong";
    $response['result'] = 0;
    $response['errMsg'] = "err!!! prepare wrong!!! please contect offical";
    echo json_encode($response);
  }else {
    mysqli_stmt_bind_param($stmt,"ss",$userName, $passWord);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $UID, $userName, $passWord, $eMail);
    mysqli_stmt_store_result($stmt);
    
    if(mysqli_stmt_num_rows($stmt) ){
      while(mysqli_stmt_fetch($stmt)){
        $response['result']=1;
        $response['successMsg']="Login success";
        $response['UID']=$UID;
        $response['userName']=$userName;
        $response['passWord']=$passWord;
        $response['eMail']=$eMail;

        echo json_encode($response);
      } 
    }else {
      $response['result'] = 0;
      $response['errMsg'] = "找不到相關帳號，請確認帳密是否有誤";
      echo json_encode($response);
    }
  }
 ?>
