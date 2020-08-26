<? php
    include_once "test1.php";


    class animal{
        public  function bark(){
            return "123123123";
        }

        
        public static function sleep(){
            echo "zzzzz";
        }
    }

    $dog = new animal;
    echo $dog;
?>