<?php
  include_once "includes/dbh.inc.php";
  // $Name = $_POST['userName'];
  $userName = $_POST['userName'];
  $passWord = $_POST['passWord'];
  // $eMail = "???";
  // $isValid = "false";
  // $birthDay = "???";

//   $query = "insert into user_Table (userName, passWord, eMail, isValid, birthDay) value (?,?,?,?,?)";
  $query = "select * from userT where userName = ? and passWord = ?";

  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $query)){
    echo "err!!! prepare wrong";
  }else {
    // code...
    //date is ??, boolean is B?
    // mysqli_stmt_bind_param($stmt,"sssb(?????????)",$userName);
    mysqli_stmt_bind_param($stmt,"ss",$userName, $passWord);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if(mysqli_stmt_num_rows($stmt) == 1){
      echo "has value";
    }else {
      echo "NO value";
    }


    echo "finish";
    // mysqli_close($conn);
  }
 ?>
