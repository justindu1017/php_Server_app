<?php
    $String = "123";

    $hash = password_hash($String,PASSWORD_DEFAULT);
    // echo $hash;
    echo "                                \\\\                          "  ;
    echo password_verify("123","$2y$10\$GwB6z.QRS29Vh9tfuO1LXe864ET3dgbSrPkbNucCtD9Ke2I3zooMS");
    
?>