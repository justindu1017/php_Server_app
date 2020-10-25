<?php
    include_once "includes/dbh.inc.php";
    
    $response = array();
    
    if(isset($_POST["LoadFrom"]) ){
        $LoadFrom = $_POST["LoadFrom"];

    }else{
        $response["result"] = 0;
        $response["ErrMsg"] = "err!!! Post Method wrong!!! please contect official";
        echo json_encode($response);
      }   


    $query = "Select AID, userName, articalTitle, CDate from T_artical ORDER BY CDate Limit 10 OFFSET ? ";

    $stmt  = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)){
        // echo "err!!! prepare wrong!!!!!!!";
        $response['result'] = 0;
        $response['ErrMsg'] = "err!!! prepare wrong!!! please contect offical";
        echo json_encode($response);
        mysqli_close($conn);
      }else {
        mysqli_stmt_bind_param($stmt,"i", $LoadFrom);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $AID, $userName, $articalTitle,$CDate);        
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_error($stmt)){
            $response['result'] = 0;
            $response['ErrMsg'] = mysqli_stmt_error($stmt);
            echo json_encode($response);
            mysqli_close($conn);

        }else{
            $response['result'] = 1;
            $reArray = array();
            while(mysqli_stmt_fetch($stmt)){
              $tempArray = array();
              array_push($tempArray, $AID);
              array_push($tempArray, $userName);
              array_push($tempArray, $articalTitle);
              array_push($tempArray, $CDate);
              array_push($reArray, $tempArray);
            }
            $response['Arr'] = $reArray;
            echo json_encode($response);
            mysqli_close($conn);
        }
      }



?>
 