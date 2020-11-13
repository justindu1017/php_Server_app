<?php
  include_once "includes/dbh.inc.php";
  $response = array();
  if(isset($_POST['AID'])){
    $AID = $_POST['AID'];
  }else{
    $response["result"] = 0;
    $response["ErrMsg"] = "err!!! Post Method wrong!!! please contect official";
    echo json_encode($response);
    mysqli_close($conn);
  }


  $query = "select articalContent from t_artical where AID  = ?";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $query)){

    $response['result'] = 0;
    $response['ErrMsg'] = "err!!! prepare wrong!!! please contect offical";
    echo json_encode($response);
    mysqli_close($conn);
  }else {
    mysqli_stmt_bind_param($stmt,"s",$AID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $articalContent);
    mysqli_stmt_store_result($stmt);
    
    if(mysqli_stmt_num_rows($stmt) ){
      while(mysqli_stmt_fetch($stmt)){
        $response['result']=1;
        $response['articalContent']=$articalContent;

        echo json_encode($response);
        mysqli_close($conn);
      } 
    }else {
      $response['result'] = 0;
      $response['ErrMsg'] = "找不到文章";
      $response['Query'] =  $stmt;
      echo json_encode($response);
      mysqli_close($conn);
    }


  }
 ?>