<?php
    $name = "test";
    $work = "Куки установлены";
    setcookie("name", $name);
    setcookie("work", $work, time()+3600);

    echo $_COOKIE["name"];
    print_r($_COOKIE);
?>