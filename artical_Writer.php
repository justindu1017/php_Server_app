
 <?php
   include_once "includes/dbh.inc.php";

   $articalID = "???";
   $userName = "???";
   $passWord = "???";
   $title = "???";
   $artical = "???";

   $query = "insert into user_Table (userName, passWord, eMail, isValid, birthDay) value (?,?,?,?,?)";

   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $query)){
     echo "err!!! prepare wrong";
     echo "test";
   }else {
     // code...
     //date is ??, boolean is B?
     mysqli_stmt_bind_param($stmt,"sssb(?????????)",$userName);
     mysqli_stmt_execute($stmt);
   }
  ?>
