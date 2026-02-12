<?php
    $tit="ССО";
    $CSS= "a {text-decoration:none;}
    td{width:20%;}";
    function display_head($tit, $CSS){
        echo"<html><head><meta charset='UTF-8'>
        <title>$tit</title>
        <style type='text/css'> $CSS
        </style></head></html>";
    }
    function display_body(){
        echo "<table border='1' width=100%>
        <tr align='center'>
        <td><a href='history.html'>История</a>
        <td><a href='admin.html'>Администрация</a>
        <td><a href='process.html'>Дневное отделение</a>
        <td><a href='otherSpec.html'>Заочное отделение</a>
        <td><a href='educational.html'>Воспитательная работа</a>
        </tr>
        </table>";
        echo"</body></html>";
    }
    display_head($tit, $CSS);
    display_body();
?>