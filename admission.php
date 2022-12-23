<?php

session_start();
if (!isset($_SESSION['User_name'])) {
    header("location:Log_in.php");
}

?>
<?php
include 'dbcon.php';

if (array_key_exists("save", $_REQUEST)) {

    $sname = mysqli_real_escape_string($conn, $_REQUEST['sname']);
    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $mname = mysqli_real_escape_string($conn, $_REQUEST['mname']);
    $dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
    $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
    $admission_date = mysqli_real_escape_string($conn, $_REQUEST['admission_date']);
    $class = mysqli_real_escape_string($conn, $_REQUEST['class']);
    $section = mysqli_real_escape_string($conn, $_REQUEST['section']);
    $admission_fee = mysqli_real_escape_string($conn, $_REQUEST['admission_fee']);
    $contact = mysqli_real_escape_string($conn, $_REQUEST['contact']);
    $alternate = mysqli_real_escape_string($conn, $_REQUEST['alternate']);
    $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
    $sql2 = "SELECT MAX(id) as rollNo FROM admissionform";
    $result = mysqli_query($conn, $sql2);
    $data = mysqli_fetch_assoc($result);
    $uniqueCode = '2022000' + $data['rollNo'] + 1;

    $sql = "insert into admissionform(rollnumber,sname,fname,mname,dob,gender,admission_date,class,section,admission_fee,contact,alternate,address)values('$uniqueCode','$sname','$fname','$mname','$dob','$gender','$admission_date','$class','$section','$admission_fee','$contact','$alternate','$address')";
    $query = mysqli_query($conn, $sql);
     
    header('location:admission_print.php?rollnumber='.$uniqueCode);
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
                <?php include 'header.php'; 
                // echo time();
                // echo "<br>";
                // echo date("Y-m-d h:i:s",1609505629);
                ?>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3 bg-dark text-white">
                <?php include 'leftbar.php'; ?>
                <div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $_SESSION['User_name']; ?>&nbsp;&nbsp;
                    <button type="submit" name="save" class="btn btn-danger"><a href="logout.php" class="text-white"
                            style="text-decoration:none;">Logout</a></button>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sname" class="form-label">Student Name</label>
                                <input type="text" name="sname" id="sname" class="form-control"
                                    placeholder="Student name" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname" class="form-label">Father Name</label>
                                <input type="text" name="fname" id="fname" class="form-control"
                                    placeholder="Father name" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mname" class="form-label">Mother Name</label>
                                <input type="text" name="mname" id="mname" class="form-control"
                                    placeholder="Mother name" required />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob" class="form-label">D.O.B <span
                                        style="color:">(mm/dd/yyyy)</span></label>
                                <input type="date" name="dob" id="dob" class="form-control" required />

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> Gender :</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                        required checked>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female" required>
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for="admission_date" class="form-label">Date of Admission</label>
                                <input type="date" name="admission_date" id="admission_date" class="form-control"
                                    value="<?=date("Y-m-d");?>" required />
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact" class="form-label">Contact No.</label>
                                <input type="text" name="contact" id="contact" placeholder="Contact Number"
                                    class="form-control" required />
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alternate" class="form-label">Alternate No.</label>
                                <input type="text" name="alternate" id="alternate" placeholder="Alternate Number"
                                    class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                    placeholder="Enter Full Address" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="classlist" class="form-label">Class </label>
                                <select id="classlist" name="class" class="form-control" required>
                                    <option value="">Class</option>
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
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="sectionlist" class="form-label">Section</label>
                                <select id="sectionlist" name="section" class="form-control" required>
                                    <option value="">section</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>

                                </select>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="hidden" name="admission_fee" value="pending" />
                                <input type="checkbox" name="admission_fee" value="1100">Admission fee
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 mt-3">
                             
                            <button type="submit" name="save" class="btn btn-primary form-control">
                                Form Submit
                            </button>
                             
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>