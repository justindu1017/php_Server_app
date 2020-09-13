<?php
    include_once "includes/dbh.inc.php";

    
    $response = array();
    
    if(isset($_POST["userName"]) && isset($_POST["eMail"]) && isset($_POST["articalTitle"]) && isset($_POST["articalContent"])){
        $userName = $_POST["userName"];
        $eMail = $_POST["eMail"];
        $articalTitle = $_POST["articalTitle"];
        $articalContent = $_POST["articalContent"];

    }else{
        $response["result"] = 0;
        $response["ErrMsg"] = "err!!! Post Method wrong!!! please contect official";
        echo json_encode($response);
      }   



    $query = "insert into T_artical (userName, eMail, articalTitle, articalContent) values (?,?,?,?)";

    $stmt  = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)){
        echo "err!!! prepare wrong!!!!!!!";
        $response['result'] = 0;
        $response['ErrMsg'] = "err!!! prepare wrong!!! please contect offical";
        echo json_encode($response);
        mysqli_close($conn);
      }else {
        mysqli_stmt_bind_param($stmt,"ssss", $userName, $eMail, $articalTitle, $articalContent);
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