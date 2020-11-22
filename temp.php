<?php
    $String = "123";

    // $hash = password_hash($String,PASSWORD_DEFAULT);
    // echo $hash;
    echo "$2y$10\$VZNhPW1glbpWcjgfdwwn\/O4E2TXNi\/3W.u8xB.8F1.zuQA0R9MegS";
    echo password_verify("1","$2y$10\$mSAL6hfFcErBAcE5926oP.w51f6shUkIHuvpuDmg8Dl.Qr5O2bE92");
    
?>