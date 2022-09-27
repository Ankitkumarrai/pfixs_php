<?php 
session_start();
?>



<!DOCTYPE html>
<html>

<head>
    <title>Admin - School management system </title>
    <meta name="viewport" content="width=device-width,intial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/style.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <div class=" container">
        <?php include 'header.php' ?>


        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <?php include 'menu.php' ?>
            </div>
        </div>

       <?php include'dbcon.php'; ?>

        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12">
  
            <form action="" method="post" class="row g-3 mb-4 pt-5 ">
            <?php

   
if(isset($_POST['save'])){
  $email_id=$_POST['email_id'];
  $password=$_POST['password'];
  $emailsearch="select *from register where email_id= '$email_id'";
  $query=mysqli_query($conn,$emailsearch);
  $emailcount=mysqli_num_rows($query);

  if($emailcount){
      $emailpass=mysqli_fetch_assoc($query);
      $dbpass=$emailpass['password'];
      $_SESSION['User_name']=$emailpass['User_name'];
      $pass_match=password_verify($password,$dbpass);
      if($pass_match){
          echo "login successfull";
          ?>
          <script>
              location.replace("adminpanel.php");
          </script>
          
          <?php
      }
      else{
            echo "<h6 style=\"color:red;\">** login incorrect </h6>";
      }
  } else{
       echo "<h6 style=\"color:red;\">** invalid email Id</h6>";
  }


}

?>       
            <div class="col-md-12">
                    <label for="emailid" class="form-label">User Name</label>
                        <input type="email" class="form-control" name="email_id" id="emailid" placeholder="Email ID" />
                    </div>
                    <div class="col-md-12">
                        <label for="passcode" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="passcode" placeholder="password" />
                    </div>
                    
                   
                        <button type="submit" name="save" class="btn btn-success">Log in</button>
                   
                   
                    <button type="reset" name="cancel" class="btn btn-danger">Cancel</button>
                        
                  
                </form>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12  mt-0 sidebar card">
                <?php require 'sidebar.php' ?>

            </div>
        </div>
        <div class="row bg-primary text-white">
            <div class="col-md-9 col-lg-9 col-sm-12">
            Pfixs ventures pvt. ltd.
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">

                <i class="fa fa-facebook-square"></i>
                <i class="fa fa-whatsapp"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-instagram"></i>
                <i class="fa fa-telegram"></i>
                <i class="fa fa-linkedin"></i>
            </div>

        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
mysqli_close($conn);
?>