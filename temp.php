<?php
    include_once "dbClass.php";
    $arr = array(
        "foo" => "bar",
        "bar" => "foo",
    );

    $test = new dbFunc($arr);
    $test->printer();
?>