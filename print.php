  
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


<body id="body">
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
                          <div class="col-md-12" id="data">
     
                                  <br><br>
                                  <table class="table table-bordered table-wheat">
                                   <tr>
                                   <th colspan="6" class="text-center">
                                    <h4>Extra  Expences : OUR Academic </h4>
                                    <p>Invice bill - other expences</p>
                                </th>
                                </tr>
                                <tr>        
                                       <th>S.no.</th>
                                       <th>Date</th>
                                       <th>Ledger</th>
                                       <th>Description</th>
                                       <th>Amount type</th>
                                       <th>Amount</th>
                                       
                                   </tr>
                                   <?php
                                    include'dbcon.php';
                                    $exp_id=$_GET['exp_id'];
                                    $selectquery="select *from expences where exp_id=$exp_id";
                                    $coderun=mysqli_query($conn,$selectquery);
                                    $rowdata=mysqli_num_rows($coderun);
                                    //echo $rowdata;
                                    while($result=mysqli_fetch_assoc($coderun)){


                                    //echo $result['exp_id'];
                                    ?> 
                                    
                                   

                                   <tr>
                                    <td><?php echo $result['exp_id'] ?></td>
                                    <td><?php echo $result['date'] ?></td>
                                    <td><?php echo $result['ledger'] ?></td>
                                    <td><?php echo $result['description'] ?></td>
                                    <td><?php echo $result['paid'] ?></td>
                                    <td><?php echo $result['amount'] ?></td>
                                    
                                   </tr>
                               </table>

                                    
                                   <?php
                                        }
                                   ?>
                               
                            </div>
                            
                                <button class="btn btn-success" onclick="printpage()">print</button>
                             
                               </div>
                         
 
                       
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
    
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function printpage(){

           var body=document.getElementById('body').innerHTML;
          // alert(body);
          var data=document.getElementById('data').innerHTML;
          document.getElementById('body').innerHTML=data;


            window.print();
            document.getElementById('body').innerHTML=body;
        }
    </script>


</body>

</html>