<?php
session_start();
if (!isset($_SESSION['User_name'])) {
    header('location:Log_in.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin - School management system </title>
    <meta name="viewport" content="width=device-width,intial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
            <div class="col-md-8 ">
                <div class="row mt-5">
                    <div class="table-responsive">
                        <table class="table-sm table table-bordered">
                            <tr>
                                <th>Rollnumber</th>
                                <th>Student name</ th>
                                <th>Father name</th>
                                <th>gender</th>
                                <th>Admission date</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Admission fee</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>

                            <?php
                            include 'dbcon.php';
                            $selectquery = "SELECT *FROM admissionform";
                            $query = mysqli_query($conn, $selectquery);
                            $num = mysqli_num_rows($query);  
                                    
                            while ($fatchfield = mysqli_fetch_array($query)) {
                                

                            ?>

                            <tr>
                                <td><a href="view-candidate.php?rollnumber=<?php echo $fatchfield['rollnumber'] ?>"
                                        Style="color:black;text-decoration:none"><?php echo $fatchfield['rollnumber'] ?></a>
                                </td>
                                <td><?php echo $fatchfield['sname'] ?></td>
                                <td><?php echo $fatchfield['fname'] ?></td>
                                <td><?php echo $fatchfield['gender'] ?></td>
                                <td><?php echo $fatchfield['admission_date'] ?></td>
                                <td><?php echo $fatchfield['class'] ?></td>
                                <td><?php echo $fatchfield['section'] ?></td>
                                <td><?php echo $fatchfield['admission_fee'] ?></td>
                                <td><?php echo $fatchfield['contact'] ?></td>
                                <td><?php echo $fatchfield['address'] ?></td>
                                <td><a href="updateadmission.php?id=<?php echo $fatchfield['id'] ?>"><i
                                            class="far fa-edit" style="color:green"></i></td>
                                <td><a href="deleteadmission.php?id=<?php echo $fatchfield['id'] ?>"><i
                                            class="fa fa-trash fa-1x" style="color:red"></i></a></td>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>