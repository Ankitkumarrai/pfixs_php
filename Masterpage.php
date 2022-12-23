  <?php

session_start();
if (!isset($_SESSION['User_name'])) {
    header("location:Log_in.php");
}

?>


  <?php
     include 'dbcon.php';
   if(isset($_POST['search'])){
      $class=$_POST['class'];
      $querycode="select *from class_fees where class=$class";
      $run=mysqli_query($conn,$querycode);
      $rawdata=mysqli_fetch_assoc($run);
      echo $rawdata['class'];
 }
   ?>


  <!DOCTYPE html>
  <html>

  <head>
      <title>Admin - School management system </title>
      <meta name="viewport" content="width=device-width,intial-scale=1.0" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/mystyle.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>


  <body>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <?php include 'header.php' ?>
              </div>

          </div>
          <div class="row">
              <div class="col-md-3 bg-dark text-white">
                  <?php include 'leftbar.php' ?>
                  <div>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <?php echo $_SESSION['User_name']; ?>&nbsp;&nbsp;
                      <button type="submit" name="save" class="btn btn-danger"><a href="logout.php" class="text-white"
                              style="text-decoration:none;">Logout</a></button>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="row pt-4">
                      <div class="col-md-8 mt-3 text-success">
                          <div class="row">


                              <div class="col-md-12">
                                  <h4>Search & add fee collection :</h4>

                              </div>
                          </div>
                          <form method="post" class="form-control">
                              <div class="row">
                                  <div class="col-md-6">
                                      <label for="class" class="form-label">class</label>
                                      <input type="text" name="class" id="class" class="form-control"
                                          placeholder="Enter the no. of class"
                                          value="<?php  if(isset($_POST['search'])){ echo $rawdata['class'];}?>"
                                          required />
                                  </div>
                                  <div class="col-md-4">
                                      <input type="submit" name="search" class="btn btn-primary"
                                          style="margin-top:31px;" value="Search" required />
                                  </div>


                              </div>
                          </form>

                          <form name="" method="post" class="form-control" action="">
                              <div class="row">
                                 
                                  <div class="col-md-8">
                                      <label for="Monthly_fee" class="form-label">Monthly_fee</label>
                                      <input type="text" name="Monthly_fee" class="form-control"
                                          placeholder="Enter Mothly fee"
                                          value="<?php if(isset($_POST['search'])){echo $rawdata['Monthly_fee'];}?>"
                                          required />

                                  </div>

                              </div>



                          </form>

                      </div>
                  </div>

              </div>
          </div>
      </div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>



  </body>

  </html>