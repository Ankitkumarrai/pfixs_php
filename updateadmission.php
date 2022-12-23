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
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['User_name']; ?>&nbsp;&nbsp;
                    <button type="submit" name="save" class="btn btn-danger"><a href="logout.php" class="text-white" style="text-decoration:none;">Logout</a></button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row pt-4">
                    <div class="col-md-12 mt-3 text-success">


                        <h4>Admission Form : </h4>

                    </div>
                </div>
                <form action="" name="Admissionform" class="form-control" method="POST">
                    <div class="row">

                        <?php
                        include 'dbcon.php';
                        $id= $_GET['id'];
                        $showquery = "Select *from admissionform where id=$id";
                        $showdata = mysqli_query($conn, $showquery);
                        $arraydata = mysqli_fetch_array($showdata);
                        //  echo $arraydata['sid'];
                        if (array_key_exists("save", $_REQUEST)) {
                            $id= $_GET['id'];

                            $sname = mysqli_real_escape_string($conn, $_REQUEST['sname']);
                            $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
                            $mname = mysqli_real_escape_string($conn, $_REQUEST['mname']);
                            $dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
                            $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
                            $admission_date = mysqli_real_escape_string($conn, $_REQUEST['admission_date']);
                            $class = mysqli_real_escape_string($conn, $_REQUEST['class']);
                            
                            $contact = mysqli_real_escape_string($conn, $_REQUEST['contact']);
                            $alternate = mysqli_real_escape_string($conn, $_REQUEST['alternate']);
                            $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
                            // $sql = "insert into admissionform(sname,fname,mname,DOB,gender,DOM,class,paidfee,contact,alternate,address)values('$sname','$fname','$mname','$DOB','$gender','$DOM','$class','$paidfee','$contact','$alternate','$address')";
                            // $query = mysqli_query($conn, $sql);


                            $update="update admissionform set id=$id,sname='$sname',fname='$fname',mname='$mname',dob='$dob',gender='$gender',admission_date='$admission_date',class='$class' ,contact='$contact',alternate='$alternate',address='$address' where id= $id";
                               $updaterun=mysqli_query($conn,$update);
                            if($updaterun){
                                header('location:adminpanel.php?msg=Data update Successfully');
                                ?>
                                <script>
  
                              alert("data update..");
                                </script>
                                <?php
                            }
                            else{
                                ?>
                                <script>
                                alert("unable update");
                             </script>
                             <?php
                            }

                            // if ($query) {
                            //     header('location:adminpanel.php?msg=Data Inserted Successfully');
                            // }
                        }









                        ?>







                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sname" class="form-label">Student Name</label>
                                <input type="text" name="sname" id="sname" class="form-control" placeholder="Student name" value="<?php echo $arraydata['sname'] ?>" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname" class="form-label">Father Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" placeholder="Father name" value="<?php echo $arraydata['fname'] ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mname" class="form-label">Mother Name</label>
                                <input type="text" name="mname" id="mname" class="form-control" placeholder="Mother name" value="<?php echo $arraydata['mname'] ?>" required />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="DOB" class="form-label">D.O.B</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $arraydata['dob'] ?>" required />

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Gender :</label>
                                <?php  ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" required >
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for="admission_date" class="form-label">Date of Admission</label>
                                <input type="date" name="admission_date" id="admission_date" class="form-control" value="<?php echo $arraydata['admission_date'] ?>" required />
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <?php echo $arraydata['class']; ?>
                            <label for="classlist" class="form-label">Class </label>
                                <select id="classlist" name="class" class="form-select" value="<?php echo $arraydata['class'] ?>" required>
                                    <option selected>Select Class</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>

                                </select>
                            </div>
                        </div>
                         
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact" class="form-label">Contact No.</label>
                                <input type="text" name="contact" id="contact" placeholder="Contact Number" class="form-control" value="<?php echo $arraydata['contact'] ?>" required />
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="alternate" class="form-label">Alternate No.</label>
                                <input type="text" name="alternate" id="alternate" placeholder="Alternate Number" class="form-control" value="<?php echo $arraydata['alternate'] ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Full Address" value="<?php echo $arraydata['address'] ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 mt-3">
                            <button type="submit" name="save" class="btn btn-primary form-control">UPDATE</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>