 <?php
   include_once "includes/dbh.inc.php";
   $Name = $_POST['userName'];

   // $userName = $_POST['userName'];
   $passWord = "???";
   $eMail = "???";
   $isValid = "false";
   $birthDay = "???";

//   $query = "insert into user_Table (userName, passWord, eMail, isValid, birthDay) value (?,?,?,?,?)";
   $query = "insert into user_Table (Name) value (?)";

   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $query)){
     echo "err!!! prepare wrong";
   }else {
     // code...
     //date is ??, boolean is B?
     // mysqli_stmt_bind_param($stmt,"sssb(?????????)",$userName);
     mysqli_stmt_bind_param($stmt,"s",$Name);
     mysqli_stmt_execute($stmt);
     echo "OKKKKKKKKKKKK";
     // echo $Name;


   }
  ?>
