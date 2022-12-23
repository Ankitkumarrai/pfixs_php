<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title">
                        <h4>add admission details</h4>
                        <div class="card-body">
                            <form name="paydemo" method="post" class="form-control">
                                <table class="form-control  table table-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Father name</th>
                                        <th>class</th>
                                        <th>admission fee</th>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="name" id="name" value="" class="form-control"
                                                placeholder="Enter the name"></th>
                                        <th><input type="text" name="Father" id="father" value="" class="form-control"
                                                placeholder="Enter the father name"></th>

                                        <th>
                                        
                                        <select class="form-select" name="class" id="class" onblur="myfunction()">
                                        <option value="">class</option>
                                        
                                        <?php 
                                              include 'dbcon.php';
                                              $select="select *from class_fees";
                                              $runquery=mysqli_query($conn,$select);
                                              $row=mysqli_num_rows($runquery);
                                              while($result=mysqli_fetch_array($runquery)){

                                               
                                           ?>        
                                        <option name="class" value="<?php echo $result['id'] ?>"><?php echo $result['class'] ?></option>
                                            <?php
                                            
                                              }
                                            ?>
                                            </select>
                                        </th>
                                        <th>
                                                
                                        <select class="form-select" name="admission_fee" id="admission_fee">
                                        <option>Admission fee</option>
                                       
                                        <?php 
                                              include 'dbcon.php';
                                              $select="select *from class_fees";
                                              $runquery=mysqli_query($conn,$select);
                                              $row=mysqli_num_rows($runquery);
                                              while($results=mysqli_fetch_array($runquery)){
   
                                               
                                           ?>        
                                              <option value="<?php echo $results['id'] ?>"><?php echo $results['admission_fee'] ?></option>
                                        <?php
                                              }
                                        ?>    
                                        </select>
                                        </th>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function myfunction(){
       var  classname=document.getElementById("class").value;
       var  admission_fee=document.getElementById("admission_fee").value;
       document.getElementByid("admission_fee").value=admission_fee;
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>