<?php

//داخل القوسين(اسم الهوست ، اسم المستخدم ، باسوورد المستخدم ، اسم قاعدة البيانات )ت
$conn = mysqli_connect('localhost', 'Ahmad', '1234','mydatabase');

//check connection 
if (!$conn){
    echo 'Connection error :' . mysqli_connect_error();
}

$sql_update = "UPDATE direction SET direction = 'R' ";


//implement the query 
mysqli_query($conn, $sql_update);

//write query 
$sql = 'SELECT * FROM direction';

// make query & get the result 
$result = mysqli_query($conn , $sql);

//fetch the resulting rows as an array 
$mydirection = mysqli_fetch_row($result );

//free result from the equery 
mysqli_free_result($result);

//pritn the result 
echo $mydirection['0'] ;

//Close connection
mysqli_close($conn);

?>