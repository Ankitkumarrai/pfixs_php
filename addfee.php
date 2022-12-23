  
<?php

session_start();
if (!isset($_SESSION['User_name'])) {
    header("location:Log_in.php");
}

 ?>
   
   <?php
  include 'dbcon.php';
  if(isset('save_fee')){
    $class=$_POST['class'];
    $admission_fee=$_POST['admission_fee'];
    $monthly_fee=$_POST['monthly_fee'];
    $query="insert into class_fees(class,admission_fee,monthly_fee)values($class,$admission_fee,$monthly_fee)";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        echo "inserted data successful";
    }
  }
?>