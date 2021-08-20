<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Customer</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
      body{
         background : radial-gradient(#fff,#ffd6d6);
          background-image: url("bank1.jpeg");
          background-repeat: no-repeat;
          background-size: 100%;
            font-family: Arial, Helvetica, sans-serif;

      }

     .bttn{
         border: 1px solid black;
         color: black;
       text-align: center;
       background-color: #cccccc;
     }
     td{
      color: green;
     }

.topnav {
  overflow: hidden;
  background-color: #333;
 
}

h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

            .button1 {
    background-color:#8FBC8F;
    color: black;
    padding: 15px 32px;
    text-align: center;
    font-size: 26px;
     } 
    </style>
</head>

<body>

  <div class="topnav" >
 <h1 style="color:white;"> TSF ONLINE BANKING </h1> 
</div>

 


<center>
 <div class="container my-4"> 
   <div class="col-lg-8">

    <table class=" table table-responsive table-striped table-hover table-bordered">
        <?php

$user = 'root';
$password = ''; 
$database = 'bank'; 
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
if(!isset($_SESSION)) {
        session_start();
    }
    $cid = mysqli_real_escape_string($mysqli, $_POST["ano"]);

    $sql =  "SELECT * FROM customer_details WHERE account_no='".$cid."'";
    $result = $mysqli->query($sql);
$mysqli->close(); 
?>
             <?php  
                while($rows=$result->fetch_assoc())
        
                {
        $ano=$rows['account_no'];
             ?>
         <tr>

        <tr class="table-dark text-dark">
           
            <th width="390">Name</th>
            <td><?php echo $rows['name'];?> </td>       
        </tr>
         <tr class="table-dark text-dark">
           
            <th width="50%" >Email</th>
            <td><?php echo $rows['email'];?> </td>       
        </tr>
        <tr class="table-dark text-dark">
           
            <th width="50%">Account Number</th>
            <td><?php echo $rows['account_no'];?></td>       
        </tr>
        <tr class="table-dark text-dark">
           
            <th width="50%">Current Balance</th>
            <td><?php echo $rows['current_bal'];?> </td>       
        </tr>
        <tr class="table-dark text-dark">
           
            <th width="50%">Address</th>
            <td><?php echo $rows['address'];?></td>       
        </tr>
          
            <?php
                }
             ?>
     
              
  </table> 

</center>
                    <div class="flex-item">
                     <h1> <a class="button1 button"href="transfer.php?ano=<?php echo $ano ?>"> Transfer Money</a> </h1>
                    </div>

    

</body>

</html>