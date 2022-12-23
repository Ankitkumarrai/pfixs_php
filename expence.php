  
<?php

session_start();
if (!isset($_SESSION['User_name'])) {
    header("location:Log_in.php");
}

?>

<?php
include'dbcon.php';
    if(isset($_POST['saveledger'])){
        $date=$_POST['date'];
        $ledger=$_POST['ledger'];
        $description=$_POST['description'];
        $amount=$_POST['amount'];
        $paid=$_POST['paid'];
         $query="insert into expences(date,ledger,description,amount,paid)values('$date','$ledger','$description','$amount','$paid')";
    $querydisp=mysqli_query($conn,$query);
    if ($querydisp) {

              header('location:adminpanel.php?msg=Expences Inserted Successfully');
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
                             <div class="col-md-3">
                            <button type="button" class="btn btn-success" style="margin-left:480px"><a href="view_expence.php" style="color:white;font-size:18px;text-decoration:none;">View Expences</a></button>
                        </div>
                    </div>



                        <div class="row">
                          <div class="col-md-12">
                                <h4>Add Expances :</h4>  
                               
                            </div>
                               </div>
                         

                        <form name="" method="post"  class="form-control" action="">
                           
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date" class="form-control" value="<?=date("Y-m-d");?>" required />

                            </div>
                                </div>
                            </div>


                            <div class="row">       
                               <div class="col-md-8"> 
                                 <select name="ledger" class="form-select"  aria-label="Default select example">
                                     <option selected>ledger</option>
                                    <option value="self">to self</option>
                                    <option value="stationary">to stationary</option>
                                    <option value="electronic">to electronic</option>
                                     <option value="water">to water</option>
                                    <option value="rent">to rent</option>
                                    <option value="other">to  other</option>
                                    </select>
                               </div>
                        
                              

                                  </div>
                                
                                 <div class="row">       
                               <div class="col-md-8"> 
                                  <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description" style="height: 100px"></textarea>
                                    <label for="description">description</label>
                                    </div>
                               </div>
                        
                              <div class="col-md-8"> 
                                   <label for="amount" class="form-label">Amount</label>
                                 <input type="number" name="amount" class="form-control" placeholder="enter amount"   required/> 

                              </div>

                                  </div>

                                
                               <div class="row">

                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="paid" id="cash" value="cash" checked>
                                     <label class="form-check-label" for="cash">Cash</label>
                                </div>
                                        <div class="form-check">
                                             <input class="form-check-input" type="radio" name="paid" id="online" value="online">
                                            <label class="form-check-label" for="online">Online</label>
                                        </div>
                               </div>
                                <div class="row">       
                                    <div class="col-md-8 ms-8 mt-3"> 
                              <input type="submit"  name="saveledger" class="btn btn-primary" value="submit" required/> 

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