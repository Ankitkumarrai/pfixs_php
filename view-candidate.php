<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body class="bg-light">

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">

                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-info rounded-left">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-10x mt-5"></i>
                            <?php 
                            include 'dbcon.php';
                             
                              $rollnumber=$_GET['rollnumber']; 
                            $selectquery = "SELECT *FROM admissionform where rollnumber=$rollnumber";
                             $query1 = mysqli_query($conn, $selectquery);
                             $num = mysqli_num_rows($query1);  
                                     
                             while($fatchfield1=mysqli_fetch_assoc($query1)){

                  
                                 
                                 ?>
                            <h2> <?php echo $fatchfield1['sname']; ?></h2>
                            <p class="bg-light text-dark">Class - <span><?php echo $fatchfield1['class']; ?></span></p>




                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">Details</h3>
                        <hr class="badge-primary mt-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Roll number</p>
                                <h6 class="text-muted"><?php echo $fatchfield1['rollnumber'];?></h6>
                            </div>

                            <div class="col-sm-6">
                                <p class="font-weight-bold">Section</p>
                                <h6 class="text-muted"><?php echo $fatchfield1['section']; ?></h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Father</p>
                                <h6 class="text-muted"><?php echo $fatchfield1['fname']; ?></h6>
                            </div>

                            <div class="col-sm-6">
                                <p class="font-weight-bold">Mother name</p>
                                <h6 class="text-muted"><?php echo $fatchfield1['mname']; ?></h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Student(D.O.B)[yyyy/mm/dd]</p>
                                <h6 class="text-muted"><?php echo $fatchfield1['dob']; ?></h6>
                            </div>

                            <div class="col-sm-6">
                                <p class="font-weight-bold">Admission date[yyyy-mm-dd]</p>
                                <h6 class="text-muted"><?php echo $fatchfield1['admission_date']; ?></h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Admission fee</p>
                                <h6 class="text-muted"><?php echo $fatchfield1['admission_fee']; ?></h6>
                            </div>
                            <?php } ?>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Monthly fee</p>
                                <?php
                              $select="SELECT * FROM `add_fee` WHERE fee_id=$rollnumber";
                              $runque=mysqli_query($conn,$select);
                              while($rowdata=mysqli_fetch_array($runque)){      
                                
                              
                            ?>
                                <span
                                    style="color:grey;font-size:15px;font-weight:bold"><?php echo $rowdata['month_fee'] ?><?php echo $rowdata['paid_fee'] ?></span>
                                <?php
                              }
                              ?>
                            </div>


                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="font-weight-bold">Pay_fee</p>
                                <?php
                              $select="SELECT * FROM `add_fee` WHERE fee_id=$rollnumber";
                              $runque=mysqli_query($conn,$select);
                              while($rowdata=mysqli_fetch_array($runque)){      
                                
                              
                            ?>
                                <span
                                    style="color:grey;font-size:15px;font-weight:bold"><?php echo $rowdata['month_fee'] ?><?php echo $rowdata['pay_fee'] ?></span>
                                <?php
                              }
                              ?>
                            </div>
                            <div class="col-sm-4">
                                <?php 
                               $selectque1="select *from summary where fee_id=$rollnumber";
                               $runque1=mysqli_query($conn,$selectque1);
                               while($data=mysqli_fetch_assoc($runque1)){

                               
                            ?>
                                <p class="font-weight-bold">Total</p>
                                <h6><?php echo $data['total'] ?></h6>

                            </div>
                            <div class="col-sm-4">
                                <p class="font-weight-bold">Balance</p>
                                <h6><?php echo $data['balance'] ?></h6>

                                <?php 
                               }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                    
                    
                    <div class="col-md-4 col-sm-12">
                        <div class="btn btn-success"><a href="viewadmission.php" style="text-decoration:none;color:white">Back</a></div>
                    </div>
                </div>

                    </div>

                  
                </div>
                
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>