<?php

    //داخل القوسين(اسم الهوست ، اسم المستخدم ، باسوورد المستخدم ، اسم قاعدة البيانات )ت
    $con = mysqli_connect('localhost', 'Ahmad', '1234','mydatabase');
    
    //check connection 
    if (!$con){
        echo 'Connection error :' . mysqli_connect_error();
    }

?>