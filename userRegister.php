<?php
    include_once "include/dbh.inc.php";
    $response = array();
    if(isset($_POST['registUsername'])&&isset($_POST['registPassword'])&&isset($_POST['registMail'])){
        $registUsername = $_POST['registUsername'];
        $registPassword = $_POST['registPassword'];
        $registMail = $_POST['registMail'];
    }else{
        $response["success"] = 0;
        $response["ErrMsg"] = "err!!! Post Method wrong!!! please contect official";
      }

    $query = "insert into usert (userName, passWord, eMail) values (?,?,?)";

    $stmt  = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($conn, $query)){
        
    }


?>