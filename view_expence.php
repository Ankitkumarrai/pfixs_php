  <?php

session_start();
if (!isset($_SESSION['User_name'])) {
    header("location:Log_in.php");
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
                                  <h4>Expance Details:</h4>

                                  <table class="table table-bordered">
                                      <tr>
                                          <th>S.no.</th>
                                          <th>Date</th>
                                          <th>Ledger</th>
                                          <th>Description</th>
                                          <th>Amount type</th>
                                          <th>Amount</th>
                                          <th>Action</th>

                                      </tr>
                                      <?php
                            include 'dbcon.php';
                            $select= "select * from expences";
                            $queryrun = mysqli_query($conn, $select);
                            $num = mysqli_num_rows($queryrun); // no. of row
                             //echo $num."<br>";
                              while($fatchfield = mysqli_fetch_array($queryrun))
                              {

                              
                                        
                             
                            ?>
                                      <tr>
                                          <td><?php echo $fatchfield['exp_id'] ?></td>
                                          <td><?php echo $fatchfield['date'] ?></td>
                                          <td><?php echo $fatchfield['ledger'] ?></td>
                                          <td><?php echo $fatchfield['description'] ?></td>
                                          <td><?php echo $fatchfield['paid'] ?></td>
                                          <td><?php echo $fatchfield['amount'] ?></td>
                                          <td><a href="print.php?exp_id=<?php echo $fatchfield['exp_id'] ?>"
                                                  style="color:black;text-decoration:none;"><i
                                                      class="fa fa-print"></i></a></td>
                                      </tr>
                                      <?php
                                 } 
                                 ?>
                                  </table>
                              </div>
                          </div>



                      </div>
                  </div>

              </div>
          </div>
      </div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>



  </body>

  </html>