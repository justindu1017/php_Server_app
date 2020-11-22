<?php
    include_once "includes/dbh.inc.php";
    $response = array();
    if(isset($_POST['registUsername'])&&isset($_POST['registPassword'])&&isset($_POST['registMail'])){
        $registUsername = $_POST['registUsername'];
        $registPassword = $_POST['registPassword'];
        $registMail = $_POST['registMail'];
    }else{
        $response["result"] = 0;
        $response["ErrMsg"] = "err!!! Post Method wrong!!! please contect official";
        echo json_encode($response);
        
        mysqli_close($conn);
      } 

    $query = "insert into usert (userName, passWord, eMail) values (?,?,?)";

    $stmt  = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)){
        echo "err!!! prepare wrong!!!!!!!";
        $response['result'] = 0;
        $response['ErrMsg'] = "err!!! prepare wrong!!! please contect offical";
        echo json_encode($response);
        mysqli_close($conn);
      }else {
        $hash = password_hash($registPassword, PASSWORD_DEFAULT);
        $response['pass'] = $hash;
        $response['passssssss'] = $registPassword;
        $response['passsssssssssss'] =password_verify($registPassword,$hash);
        // mysqli_stmt_bind_param($stmt,"sss",$registUsername, $registPassword, $registMail);
        mysqli_stmt_bind_param($stmt,"sss",$registUsername, $hash, $registMail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_error($stmt)){
            $response['result'] = 0;
            $response['ErrMsg'] = mysqli_stmt_error($stmt);
            echo json_encode($response);
            mysqli_close($conn);

        }else{
            $response['result'] = 1;
            echo json_encode($response);
            mysqli_close($conn);
        }
      }

?>