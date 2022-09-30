<?php
   $server="localhost";
   $user="root";
   $password="";
   $db="registration";
   $conn=mysqli_connect($server,$user,$password,$db) or die("conection failed");
      if($conn){
         ?>

         <?php 
      }
      else
      {
         ?>
  
         <?php
      }

?>
