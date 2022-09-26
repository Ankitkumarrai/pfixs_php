<!DOCTYPE html>
<html>

<head>
    <title>signup -school management system</title>
    <meta name="viewport" content="width=device-width,intial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'dbcon.php';
    if (isset($_POST['save'])) {
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $fathername = mysqli_real_escape_string($conn, $_POST['fathername']);
        $mothername = mysqli_real_escape_string($conn, $_POST['mothername']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $alternate = mysqli_real_escape_string($conn, $_POST['alternate']);
        $whatsapp_no = mysqli_real_escape_string($conn, $_POST['whatsapp_no']);
        $district = mysqli_real_escape_string($conn, $_POST['district']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
        $User_name = mysqli_real_escape_string($conn, $_POST['User_name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);


        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
        $emailquery = "select *from register where email_id= '$email_id'";
        $query = mysqli_query($conn, $emailquery);
        $emailcount = mysqli_num_rows($query);
        if ($emailcount > 0) {
            echo "<br>Email id already Exist";
        } else 
      if ($password === $cpassword) {
            $inserquery = "insert into register(firstname,lastname,fathername,mothername,birthday,alternate,whatsapp_no,district,gender,email_id,User_name,password,cpassword)values('$firstname','$lastname','$fathername','$mothername','$birthday','$alternate','$whatsapp_no','$district','$gender','$email_id','$User_name','$pass','$cpass')";
            $result = mysqli_query($conn, $inserquery);
            if (!$result) {
    ?>
                <script>
                    alert(" no data inserted");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("inserted data");
                </script>
    <?php
            }
        } else {
            echo "password not matching";
        }
    }


    ?>





    <div class=" container">
        <?php require_once 'header.php' ?>


        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <?php require 'menu.php' ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12">
                <form action="" name="frm" class="row  g-3 mb-4" method="post" onsubmit="return validation()">
                    <div class="col-md-6">
                        <label name="first-name" class="form-label">First name</label>
                        <input type="text" name="firstname" id="first-name" class="form-control" placeholder="Enter the first name" autocomplete="off" required />
                        <span id="firstname" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="last-name" class="form-label">Last name</label>
                        <input type="text" name="lastname" id="last-name" class="form-control" placeholder="Enter the last name"  autocomplete="off" required />
                    </div>
                    <div class="col-md-6">
                        <label for="father-name" class="form-label">Father name</label>
                        <input type="text" name="fathername" id="father-name" class="form-control" placeholder="Enter the father name" autocomplete="off"  required />
                    </div>
                    <div class="col-md-6">
                        <label for="mother-name" class="form-label">Mother name</label>
                        <input type="text" name="mothername" id="mother-name" class="form-control" placeholder="Enter the mother name" autocomplete="off" required />
                    </div>
                    <div class="col-md-6">
                        <label for="DOB" class="form-lebel">D.O.B </label>
                        <input type="date" id="DOB" name="birthday" class="form-control" autocomplete="off" required />
                    </div>
                    <div class="col-md-6">
                        <label for="alternate-no" class="form-lebel">Alternate Contact no</label>
                        <input type="number" id="alternate-no" name="alternate" class="form-control" placeholder="Contact number" autocomplete="off" required />
                    </div>
                    <div class="col-md-6">
                        <label for="whatsapp" class="form-lebel">whatsapp no.</label>
                        <input type="number" id="whatsapp" name="whatsapp_no" class="form-control" placeholder="whatsapp no." autocomplete="off" required />
                    </div>
                    <div class="col-md-6">
                        <label for="location" class="form-lebel">Select District</label>
                        <select class="form-select" id="location" name="district" autocomplete="off" required>
                            <option>Allahabad</option>
                            <option>Kanpur</option>
                            <option>Kannoj</option>
                            <option>Ahemdabad</option>
                        </select>

                    </div>

                    <div class="col-md-12 ">
                        <label class="form-lebel">Choose Gender</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" checked>
                            <label class="form-check-label" for="radio1">male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="gender" value="female">
                            <label class="form-check-label" for="radio2">female</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email Id</label>
                        <input type="email" id="email" name="email_id" class="form-control" placeholder="Enter Valid Email Id" autocomplete="off" required />
                    </div>
                    <div class="col-md-12">
                        <label for="users" class="form-lebel">User name</label>
                        <input type="text" class="form-control" id="users" name="User_name" placeholder="User name" autocomplete="off" required />
                    </div>
                    <div class="col-md-6">
                        <label for="passcode" class="form-lebel">Password</label>
                        <input type="password" class="form-control" id="passcode" name="password" placeholder="Password" autocomplete="off" required />
                    </div>
                    <div class="col-md-6">
                        <label for="cpasscode" class="form-lebel">Confirm password</label>
                        <input type="password" id="cpasscode" name="cpassword" class="form-control" placeholder="Confirm password" autocomplete="off" required />
                    </div>
                    <div class="col-md">
                        <button type="submit" name="save" class="btn btn-primary">Form Submit</button>
                    </div>


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


    <script>
        function validation(){
            var first =document.getElementById('firstname').value;
            if(first==" "){
                document.getElementById('firstname').innerHTML=" * * please fill first name field";
                return false;
            }
        }
    </script>



</body>

</html>