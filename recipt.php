 <?php

session_start();
if (!isset($_SESSION['User_name'])) {
    header("location:Log_in.php");
}

?>


 <?php
     include 'dbcon.php';
   if(isset($_POST['search'])){
    $rollnumber=$_POST['rollnumber'];
    $selectquery="select a1.sname,a1.fname,a1.dob,c1.class,c1.Monthly_fee,a1.rollnumber from admissionform a1 inner join class_fees c1 where a1.rollnumber=$rollnumber and a1.class=c1.class";
    $coderun=mysqli_query($conn,$selectquery);
    $result=mysqli_fetch_assoc($coderun);
     echo $result['rollnumber'];
 }
   ?>


 <?php
   if(isset($_POST['save'])){
      $fee_id = $_REQUEST['rollnumber'];
       $class=$_REQUEST['class'];
       $fees_date=$_POST['fees_date'];
       $total=$_POST['total'];
       $balance=$_POST['balance'];

       $month_fee=$_POST['month_fee'];
       $paid_fee=$_POST['paid_fee'];
       $pay_fee=$_POST['pay_fee'];
       $dues_fee=$_POST['dues_fee'];
       
       foreach($month_fee as $index =>$month_fees){
        $s_month_fee=$month_fees;
      //  echo $s_month_fee."<br>";
        $s_paid_fee=$paid_fee[$index];
        //echo $s_paid_fee."<br>";
        $s_pay_fee=$pay_fee[$index];
      //  echo $s_pay_fee."<br>";
        $s_dues_fee=$dues_fee[$index];
      //  echo $s_dues_fee;
        
      $query="insert into add_fee(fee_id,class,fees_date,month_fee,paid_fee,pay_fee,dues_fee)values($fee_id,$class,'$fees_date','$s_month_fee','$s_paid_fee','$s_pay_fee','$s_dues_fee')";
    $select=mysqli_query($conn,$query);
        }
$query1="insert into summary(fee_id,class,fees_date,total,balance)values($fee_id,$class,'$fees_date','$total','$balance')";
        $runquery=mysqli_query($conn,$query1);


        if($select){
            //   echo "record insert successfull...";
            //  $msg="Insert data successful";
            //  header("location:admission.php?msg=$msg");
            header('location:print_fee_recipt.php?rollnumber='.$fee_id);

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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
     <script>
     $(document).ready(function() {
         var html =
             '<tr> <td><input type="text" class="form-control" name="month_fee[]" required=""></td><td><input type="text" class="form-control" name="paid_fee[]" value="<?php if(isset($_POST['search'])){echo $result['Monthly_fee'];} ?>" required=""></td><td><input type="text" class="form-control" name="pay_fee[]" onblur="balc()" required=""></td><td><input type="text" class="form-control" name="dues_fee[]" value=""   required=""></td><td><input type="button" class="btn btn-danger" name="remove" id="remove" value="remove"></td></tr>';
         var max = 3;
         var x = 1;
         $("#add").click(function() {
             // alert("ok");
             if (x <= max) {
                 $("#table_field").append(html);


                 x++;
             }


         });
         $("#table_field").on('click', '#remove', function() {
             $(this).closest('tr').remove();
             x--;
         });


     });
     </script>
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
             <div class="col-md-8">
                 <div class="row pt-4">
                     <div class="col-md-10 mt-3 text-success">
                         <div class="row">


                             <div class="col-md-12">
                                 <h4>Search & add fee collection :</h4>

                             </div>
                         </div>
                         <form method="post" class="form-control">
                             <div class="row">
                                 <div class="col-md-6">
                                     <label for="rollnumber" class="form-label">Roll number</label>
                                     <input type="text" name="rollnumber" id="rollnumber" class="form-control"
                                         placeholder="Enter the roll number"
                                         value="<?php if(isset($_POST['search'])){echo $result['rollnumber'];} ?>"
                                         required />
                                 </div>
                                 <div class="col-md-4">
                                     <input type="submit" name="search" class="btn btn-primary" style="margin-top:31px;"
                                         value="Search" required />
                                 </div>


                             </div>
                         </form>

                         <form name="pay" method="post" class="form-control" action="">
                             <div class="row">
                                 <div class="col-md-6">
                                     <label for="sname" class="form-label">Student Name</label>
                                     <input type="text" name="sname" class="form-control"
                                         value="<?php if(isset($_POST['search'])){echo $result['sname'];} ?>"
                                         required />
                                 </div>

                                 <div class="col-md-6">
                                     <label for="fname" class="form-label">Father Name</label>
                                     <input type="text" name="fname" class="form-control"
                                         value="<?php if(isset($_POST['search'])){echo $result['fname'];} ?>"
                                         required />

                                 </div>

                             </div>


                             <div class="row">
                                 <div class="col-md-6">
                                     <label for="dob" class="form-label">dob</label>
                                     <input type="date" name="dob" class="form-control"
                                         value="<?php if(isset($_POST['search'])){echo $result['dob'];} ?>" required />
                                 </div>

                                 <div class="col-md-6">
                                     <label for="c_class" class="form-label">class </label>
                                     <input type="number" name="class" class="form-control"
                                         value="<?php if(isset($_POST['search'])){echo $result['class'];} ?>"
                                         required />
                                 </div>

                             </div>




                             <div class="row">

                                 <div class="col-md-4">
                                     <label for="rollnumber" class="form-label">Roll number</label>
                                     <input type="text" name="rollnumber" id="rollnumber" class="form-control"
                                         placeholder="Enter the roll number"
                                         value="<?php if(isset($_POST['search'])){echo $result['rollnumber'];} ?>"
                                         required />
                                 </div>
                                 <div class="col-md-4">

                                     <label for="Monthly_fee" class="form-label">Monthly fee</label>
                                     <input type="text" name="Monthly_fee" class="form-control"
                                         value="<?php if(isset($_POST['search'])){echo $result['Monthly_fee'];} ?>"
                                         required />

                                 </div>
                                 <div class="col-md-4">
                                     <label for="fees_date" class="form-label">Fee Date</label>
                                     <input type="date" name="fees_date" class="form-control"
                                         value="<?=date("Y-m-d");?>" required />
                                 </div>

                             </div>


                             <div class="row">
                                 <div class="col-md-10 card-body input-field">
                                     <table class="table table-bordered" id="table_field">
                                         <tr>
                                             <th>Month name</th>
                                             <th>Paid fee</th>
                                             <th>Pay fee</th>
                                             <th>Dues fee</th>
                                             <th>Action</th>
                                         </tr>
                                         <tr>
                                             <td><input type="text" class="form-control" name="month_fee[]" required="">
                                             </td>
                                             <td><input type="text" class="form-control" name="paid_fee[]" id="paid_fee"
                                                     value="<?php if(isset($_POST['search'])){echo $result['Monthly_fee'];} ?>"
                                                     required=""></td>
                                             <td><input type="text" class="form-control" name="pay_fee[]" id="pay_fee"
                                                     onblur="balc()" required="">
                                             </td>
                                             <td><input type="text" class="form-control" name="dues_fee[]" id="dues_fee"
                                                     required="">
                                             </td>
                                             <td><input type="button" class="btn btn-warning" name="add" id="add"
                                                     value="add" onclick="totalIt();total1();"></td>

                                         </tr>
                                     </table>
                                     <table class="table table-striped">
                                         <tr>
                                             <th>Total</th>
                                             <td><input type="text" name="total" readonly="readonly" value="" /></td>
                                             <th>Balance</th>
                                             <td>
                                                 <input type="text" name="balance" readonly="readonly" value="" />
                                             </td>

                                         </tr>
                                     </table>
                                     <center>
                                         <input type="submit" class="btn btn-success" name="save" id="save"
                                             value="Save Data">
                                     </center>
                                 </div>
                             </div>




                             </from>
                             <script>
                             function balc() {
                                 var paid = document.getElementById("paid_fee");
                                 var pay = document.getElementById("pay_fee");
                                 var dues = document.getElementById("dues_fee");
                                 dues.value = parseInt(paid.value) - parseInt(pay.value);

                             }
                             </script>

                             <script type="text/javascript">
                             function totalIt() {
                                 var input = document.getElementsByName("pay_fee[]");
                                 var total = 0;
                                 for (var i = 0; i < input.length; i++) {

                                     total += parseFloat(input[i].value);

                                 }
                                 document.getElementsByName("total")[0].value = "" + total.toFixed();
                                 //alert("23...");

                             }

                             function total1() {
                                 var input = document.getElementsByName("dues_fee[]");
                                 var total = 0;
                                 for (var i = 0; i < input.length; i++) {

                                     total += parseFloat(input[i].value);

                                 }

                                 document.getElementsByName("balance")[0].value = "" + total.toFixed();
                             }
                             </script>
                             <script
                                 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">
                             </script>



 </body>

 </html>