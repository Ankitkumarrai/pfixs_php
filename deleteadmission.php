<?php
include 'dbcon.php';
$id=$_GET['id'];
$deletequery="delete from admissionform where id=$id";
$deletequery_run=mysqli_query($conn,$deletequery);
if($deletequery_run){
    header('location:adminpanel.php?msg=data deleted !!');
    ?>
    <script>
        alert("data deleted !!");
    </script>
 <?php 

}else{
 ?> 
 <script>
 alert("data not deleted !!");
 </script>  
 <?php
}

?>