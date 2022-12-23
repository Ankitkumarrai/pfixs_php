  
<?php

session_start();
if (!isset($_SESSION['User_name'])) {
    header("location:Log_in.php");
}

 
   
 ?>
<?php
include 'dbcon.php';
if(isset($_POST['Adddata'])){
    $class=$_POST['class'];
   // $admission_fee=$_POST['admission_fee'];
    $Monthly_fee=$_POST['Monthly_fee'];
    $query="insert into class_fees(class,Monthly_fee)values($class,$Monthly_fee)";
    $query_run=mysqli_query($conn,$query);
    if ($query_run) {
     echo "data inserted";
    }
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
                    <div class="col-md-8 mt-3 text-success">
                         <div class="row">
 

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="class">Class</label>
                                <select name="class" class="form-control">
                                    
                                    <option value="">select class</option>
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

                            <!-- <div class="from-group">
                                <label for="admission_fee">Admission Fee</label>
                                <input type="number" name="admission_fee" placeholder="Enter Admission fee" class="form-control">

                            </div>  -->
                             <div class="from-group"> 
                                <label for="Monthly_fee">Monthly_fee</label>
                                <input type="number" name="Monthly_fee" placeholder="Enter Monthly fee" class="form-control">

                            </div>
                            <div class="col-md-8 ms-8 mt-3"> 
                              <input type="submit"  name="Adddata" class="btn btn-primary" value="ADD FEE" required/> 

                                  </div>

                        
                        </form>



                        </div>
                         

                     
                       
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>