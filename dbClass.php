<?php
  require_once "includes/dbh.inc.php";

  class dbFunc{
      public $case;

      function  __construct(array $case){
        $this->case = $case;
      }
      function printer(){
        // print_r ($this->case);
        echo $this->case["foo"];
      }
  }
?>