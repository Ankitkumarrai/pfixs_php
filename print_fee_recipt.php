<?php 
include 'dbcon.php';
 if(array_key_exists('rollnumber',$_REQUEST))
 {
     $sql="select *from admissionform where rollnumber=".$_REQUEST['rollnumber'];
     $runsql=mysqli_query($conn,$sql);
     $datavalue=mysqli_num_rows($runsql);
    // echo $datavalue;
  $fetchdata=mysqli_fetch_assoc($runsql);
 // echo $fetchdata['rollnumber'];
  //echo $fetchdata['rollnumber']; 
   $selectsql="select *from summary where fee_id=".$_REQUEST['rollnumber'];
   $selectrun=mysqli_query($conn,$selectsql);
   $summarydata=mysqli_fetch_assoc($selectrun);
//   //echo $summarydata["total"];
 
 
 
}
          
   
 ?>
<html>

<head>
    <title>Fee recipt</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <style>
      h1 {
        margin-bottom:-40px;
        margin-left: 25px;
    }

    h5 {
        margin-top: 40px;
        margin-left: 130px;
    }

    p {
        margin-top: -20px;
        margin-left: 148px;
    }

    table {
        border: 2px solid black;margin-top:-75px;
    }
 
    .btn{margin-left:330px;margin-top:30px;}
    img{
         width:150px;margin:-1px;
    }
    </style>
</head>

<body>

    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td><img src="image\schoollogo.jpg"></td>
            <td class="align1" colspan="6">
                <h1>Shree nayarayan international school</h1>
                <h5>Bharat petroleum cross road besides kanha Duplex</h5>
                <p>new market ,baghara,lucknow 203345</p>
            </td>
        </tr>
        
        <tr>
            <th colspan="6" style="border:2px solid black">Fees Recipt</th>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>    
            <th>Rollnumber</th>
            <td><?php echo $fetchdata['rollnumber'] ?></td>
            <td>&nbsp;</td>
            <td></td>
            <?php 
             if(array_key_exists('rollnumber',$_REQUEST))
             {
                $sql1="select *from add_fee where fee_id=".$_REQUEST['rollnumber'];
                $runque=mysqli_query($conn,$sql1);
                $result=mysqli_fetch_assoc($runque); 
              //echo $result['month_fee'];
             }
            ?>
            <th>Fees Date</th>
            <td style="text-align:center"><?php echo $result['fees_date']; ?></td>

        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <th>Student Name</th>
            <td><?php echo $fetchdata['sname'] ?></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <!-- <tr>
            <th>Father Name</th>
            <td><?php //echo $fetchdata['fname']; ?></td>

        </tr>
        <tr><td>&nbsp;</td></tr> -->
        <tr>
           
            <th style="border:0px solid black"><b>Class &nbsp;</b><?php echo $fetchdata['class']; ?></th>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            
            <th style="border:0px solid black;"><b>Section &nbsp;</b><?php echo $fetchdata['section']; ?></th>

        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            
            <th >Student Fee Detail's</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <th>Amount</th>
            
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
      
        <tr>
            
            <th >Monthly fee.</th>
            
            </tr>
            <?php 
            if(array_key_exists('rollnumber',$_REQUEST))
             {
                $sql1="select *from add_fee where fee_id=".$_REQUEST['rollnumber'];
                $runque=mysqli_query($conn,$sql1);
                while($result=mysqli_fetch_array($runque)){

                 ?>
          <tr>
            <td>&nbsp;</td> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            
            <th><?php echo $result['month_fee'];?><?php echo $result['pay_fee'];?></th></tr>
      <?php
                }
            }
       ?>           
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
      
        <tr>
            <th >Balance</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            
 <?php 
 
if(array_key_exists('rollnumber',$_REQUEST))
{
    $balc=0;
   $sql1="select *from summary where fee_id=".$_REQUEST['rollnumber'];
   $runque=mysqli_query($conn,$sql1);
   while($result=mysqli_fetch_array($runque)){
        $balc=$balc+$summarydata['balance'];
    }
}
           ?>
 
            <th><?php echo $balc;?></th>
   <?php 
  
   ?>         
        </tr>
        <tr><td>&nbsp;</td></tr>

  <br><br>
 <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
       
        <tr>
            <th >Total</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            
 <?php 
 
if(array_key_exists('rollnumber',$_REQUEST))
{
    $sum=0;
   $sql1="select *from summary where fee_id=".$_REQUEST['rollnumber'];
   $runque=mysqli_query($conn,$sql1);
   while($result=mysqli_fetch_array($runque)){
        $sum=$sum+$summarydata['total'];
    }
}
           ?>
 
            <th><?php echo $sum ?></th>
   <?php 
  
   ?>         
        </tr>
        <tr><td>&nbsp;</td></tr>

  <br><br>
 <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
 
 <tr>
     
     <th style="color:green;text-align:right"><h4>Gardian singnature</h4></th>
     <td></td>
     <td></td>
     <td>&nbsp;</td>   
     <td>&nbsp;</td>       
    <th style="color:green;"><h4>Cashiar singnature</h4><th>
 </tr>
    </table>
    
    <button type="submit" class="btn" onclick="window.print();">Print</button>
</body>

</html>   
