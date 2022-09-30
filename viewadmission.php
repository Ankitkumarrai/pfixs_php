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
            <div class="col-md-8 ">
                <div class="row mt-5">
                    <div class="table-responsive">
                        <table class="table-sm table table-bordered">
                            <tr>
                                <th>id</ th>
                                <th>sname</ th>
                                <th>fname</th>
                                <th>mname</th>
                                <th>DOB</th>
                                <th>gender</th>
                                <th>DOM</th>
                                <th>class</th>
                                <th>paidfee</th>
                                <th>Contact</th>
                                <th>alternate</th>
                                <th>address</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>

                            <?php
                            include 'dbcon.php';
                            $selectquery = "select * from admissionform";
                            $query = mysqli_query($conn, $selectquery);
                            $num = mysqli_num_rows($query); // no. of row
                            // echo $num;
                            //  $fatchfield = mysqli_fetch_array($query); 
                            //  echo $fatchfield['sname'];           // fatch fields  in a table
                            while ($fatchfield = mysqli_fetch_array($query)) {
                                // echo $fatchfield['mname'] . "<br>";

                            ?>

                                <tr>
                                    <td><?php echo $fatchfield['id'] ?></td>
                                    <td><?php echo $fatchfield['sname'] ?></td>
                                    <td><?php echo $fatchfield['fname'] ?></td>
                                    <td><?php echo $fatchfield['mname'] ?></td>
                                    <td> <?php echo $fatchfield['DOB'] ?></td>
                                    <td><?php echo $fatchfield['gender'] ?></td>
                                    <td><?php echo $fatchfield['DOM'] ?></td>
                                    <td><?php echo $fatchfield['class'] ?></td>
                                    <td><?php echo $fatchfield['paidfee'] ?></td>
                                    <td><?php echo $fatchfield['contact'] ?></td>
                                    <td><?php echo $fatchfield['alternate'] ?></td>
                                    <td><?php echo $fatchfield['address'] ?></td>
                                    <td><a href="updateadmission.php?id=<?php echo $fatchfield['id'] ?>"><button class="btn btn-success">Update</button></a></td>
                                    <td><a href="deleteadmission.php?id=<?php echo $fatchfield['id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
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