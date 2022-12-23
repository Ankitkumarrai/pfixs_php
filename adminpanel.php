<?php

session_start();
if (!isset($_SESSION['User_name'])) {
    header('location:Log_in.php');
}

$msg  = '';
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
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
            <div class="col-md-3 bg-dark  text-white">
                <?php include 'leftbar.php' ?>
                <div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['User_name']; ?>&nbsp;&nbsp;
                    <button type="submit" name="save" class="btn btn-danger"><a href="logout.php" class="text-white" style="text-decoration:none;">Logout</a></button>
                </div>
            </div>
            <div class="col-md-8 ms-5 ps-5 text-center">
                <div class="row">
                    <?php
                    if (isset($_GET['msg'])) {
                        
                    ?>
                        <div class="alert alert-success mt-3" role="alert">
                            <?php echo $msg; ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php include 'boxes.php' ?>


                </div>




            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>