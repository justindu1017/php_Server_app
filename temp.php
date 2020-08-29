<?php
  include_once "includes/dbh.inc.php";
    $pass = "Justin";
    $query = "select UID, userName from usert where passWord = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)){
        echo "err!!! prepare wrong";
    }else {
        mysqli_stmt_bind_param($stmt,"s", $pass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $UID, $userName);
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)>0){
            while(mysqli_stmt_fetch($stmt)){
                $id = $UID;
                $NAM = $userName;
                printf ("%s (%s)\n", $NAM, $id);
                echo "\nhas value";
            }
        }else{
            echo "no value";
        }
    }
    mysqli_close($conn);
 ?>