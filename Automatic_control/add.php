<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Automatic direction</title>

    <style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center ;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

      .box {
          top: 50%;
          left: 50%;
          width: 400px;
          padding: 40px;  
          }


      body {
        margin: 0 auto;
        background-color: lightblue;
        text-align: center  ;
        width: 1280px;
        height: 1024px;
        max-width: 500px;
        margin: auto;
      

           }

    </style>

    
</head>
<body>
  <div class="box">
    <form action="add.php" method="POST"><!-- form for inputs -->
            <label>Forward:</label><br>
            <input type="number" name="F"> <input type="submit" value="done" > <br><br>
    </form>
    <form action="add.php" method="POST">
            <label>Right:</label><br>
            <input type="number" name="R">  <input type="submit" value="done" ><br><br>
    </form>        
    <form action="add.php" method="POST">
            <label>Left:</label><br>
            <input type="number" name="L">  <input type="submit" value="done" ><br><br>
    </form>        
    <form action="add.php" method="POST">
            <input id="btn_delete" name="delete_btn" type="submit" value="delete"> <br><br>
    </form>
    </div>



<?php 
    //الاتصال بقاعدة البيانات 
    include ('config/db_connect.php'); 
    
    // لنعرف ما إذا اختار المستخدم الاتجاه للأمام أم لا
    if(isset($_POST["F"])){
        if(!empty($_POST["F"])){
            //إرسال اتجاه الروبوت ومسافة التحرك إلى قاعدة البيانات
    $sql_1 = "INSERT INTO automatic_direction (Direction, amount)
                 VALUES ( 'F' , '".$_POST ["F"]."') " ; 
                
             mysqli_query($con,$sql_1);//تنفيذ الإرسال إلى قاعدة البيانات
    
    }
        else{
            echo "you have to enter a value" . "<br> " ;//في حال لم يدخل المستخدم أي قيمة
        }

    }
    // لنعرف ما إذا اختار المستخدم الاتجاه لليمين أم لا
    else if (isset($_POST["R"])){
        if(!empty($_POST["R"])){
        $sql_2 = "INSERT INTO automatic_direction (Direction, amount)
                 VALUES ('R' , '".$_POST ["R"]."') " ; 
                
         mysqli_query($con,$sql_2);//تنفيذ الإرسال إلى قاعدة البيانات

        }
        else{
            echo "you have to enter a value";//في حال لم يدخل المستخدم أي قيمة
        }
    }
    // لنعرف ما إذا اختار المستخدم الاتجاه لليسار أم لا
    else if (isset($_POST["L"])){
        if(!empty($_POST["L"])){
        $sql_3 = "INSERT INTO automatic_direction (Direction, amount)
                 VALUES ('L' , '".$_POST ["L"]."') " ; 
                 
         mysqli_query($con,$sql_3);//تنفيذ الإرسال إلى قاعدة البيانات
        }
        else {
            echo "you have to enter a value";//في حال لم يدخل المستخدم أي قيمة
        }
    }
    //delete button : 
    else if (isset($_POST["delete_btn"])){
            $query_delete = "DELETE FROM automatic_direction ";
            $delete_my_data = mysqli_query($con,$query_delete);
            if ($delete_my_data){
                echo "Every thing deleted ." . "<br>"; //في حال تم المسح 
            }
          }



    //لاستخراج البيانات من قاعدة البيانات 
    $query_selct = "SELECT * from automatic_direction ";
    $result = mysqli_query($con,$query_selct);

    //ترتيب البيانات في صفوف وأعمدة 
    if (mysqli_num_rows($result) > 0) {
?>
<table>
  <tr>
    <th>id</th>
    <th>Direction</th>
    <th>amount</th>
  </tr>
  <?php 
  // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          
          ?>
  <tr>
    <td> <?php echo $row["id"] ;?> </td>
    <td><?php echo $row["Direction"] ; ?> </td>
    <td><?php echo $row["amount"];  ?> </td>
  </tr>
<?php }}
else {
  echo "No data";//إذا لم يكن هناك أي بيانات في قاعدة البيانات
}?>
</table>
</body>
</html>