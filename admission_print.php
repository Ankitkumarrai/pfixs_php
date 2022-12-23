<?php 
include 'dbcon.php';
 if(array_key_exists('rollnumber',$_REQUEST))
 {
    
    $sql="select *from admissionform where rollnumber=".$_REQUEST['rollnumber'];
     $runsql=mysqli_query($conn,$sql);
     $datavalue=mysqli_num_rows($runsql);
   //  echo $datavalue;
  while($fetchdata=mysqli_fetch_assoc($runsql)){
 // echo $fetchdata['rollnumber'];

 ?>
<html>

<head>
    <title>Admission recipt</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <style>
    .align1 {
        margin-bottom: 70px;
        margin-left: 400px;
    }

    h1 {
        margin-bottom: -40px;
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
        border: 2px solid black;margin-top:10px;
    }

    .btn {
        margin-left: 325px;
        margin-top: 30px;
    }
    img{
        margin:-1px;width:150px;
    }
    </style>
</head>

<body>

    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td><img src="image\schoollogo.jpg"></td>
            <td class="align1" colspan="5">
                <h1>Shree nayarayan international school</h1>
                <h5>Bharat petroleum cross road besides kanha Duplex</h5>
                <p>new market ,baghara,lucknow 203345</p>
            </td>
        </tr>

        <tr>
            <th colspan="5" style="border:2px solid black">Fees Recipt</th>
        </tr>
        <tr>
            <th>Rollnumber</th>
            <td><?php echo $fetchdata['rollnumber'] ?></td>
            <td>&nbsp;</td>
            <th style="text-align:center">Admission Date</th>
            <td style="text-align:center"><?php echo $fetchdata['admission_date']; ?></td>

        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th>Student Name</th>
            <td><?php echo $fetchdata['sname'] ?></td>
        </tr>
         
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <th style="border:0px solid black"><b>Class &nbsp;</b><?php echo $fetchdata['class']; ?></th>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

            <th style="border:0px solid black;"><b>Section &nbsp;</b><?php echo $fetchdata['section']; ?></th>

        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <th>Student Fee Detail's</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>

            <th>Amount</th>

        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
         
        <tr>

            <th>Admission fee.</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>

            <th><?php echo $fetchdata['admission_fee'] ?></th>

        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>

        <tr>

            <th>Total</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>

            <th><?php echo $fetchdata['admission_fee'] ?></th>

        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>

        <?php 
   }

    
}

 
 ?>  
  
        <tr>

            <td style="color:green;text-align:center">
                <h4>Gardian singnature</h4>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td style="color:green;text-align:center">
                <h4>Cashier singnature</h4>
            <td>
        </tr>
    </table>

    <button type="submit" class="btn" onclick="window.print();">Print</button>
</body>

</html>