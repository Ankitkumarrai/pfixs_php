<?php
session_start();
if (!isset($_SESSION['User_name'])) {
    header("location:Log_in.php");
}
?>
<?php

   include 'dbcon.php';
   if(isset($_POST['search'])){
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $selectcode="select * from summary join admissionform on summary.fee_id=admissionform.rollnumber where fees_date Between '$from_date' and '$to_date' order by fees_date";
    $runquery=mysqli_query($conn,$selectcode);
    $count=mysqli_num_rows($runquery);
   }
   
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Day_report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="adminpanel.php"><input type="button" class="btn btn-success" value="back" /></a>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <h1>Day wise Day_report</h1>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="from_date" class="form-label">From date</label>
                                    <input type="date" name="from_date" id="from_date" value="<?=date("Y-m-d");?>"
                                        required />
                                </div>
                                <div class="col-md-4">
                                    <label for="to_date">To date</label>
                                    <input type="date" name="to_date" id="to_date" value="<?=date("Y-m-d");?>"
                                        required />

                                </div>
                                <div class="col-md-3">
                                    <button type="submit" name="search" class="btn btn-primary">Search Report</button>

                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">

                <table class="table table-striped">
                    <tr>
                        <th>Roll no.</th>
                        <th>Student name</th>
                        <th>Father name</th>
                        <th>Mother name</th>
                        <th>class</th>
                        <th>total</th>
                        <th>Balance</th>

                    </tr>
                    <?php
        
        $sum=0;
        $balc=0;
             
if($count){
  

       while($result=mysqli_fetch_array($runquery)){
        //  echo $result['total'];
     $sum=$sum+$result['total']; 
     $balc=$balc+$result['balance'];         
        ?>

                    <tr>
                        <td><?php echo $result['fee_id']; ?></td>
                        <td><?php echo $result['sname']; ?></td>
                        <td><?php echo $result['fname']; ?></td>
                        <td><?php echo $result['mname']; ?></td>
                        <td><?php echo $result['class']; ?></td>
                        <td><?php echo $result['total']; ?></td>
                        <td><?php echo $result['balance']; ?></td>

                    </tr>
                    <?php 
          }
        }
          ?>

                </table>

                <table class="table table-condensed table-striped  table-hover">
                    <tr>
                        <th width="1%">Total :</th> <td width="11%"><?php echo $sum; ?></td>
                        <th width="1%">Balance :</th><td width="1%"><?php echo $balc; ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>