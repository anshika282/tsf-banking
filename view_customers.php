<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>VIiew customer</title>
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
       background-color:#8FBC8F;
     }
     td{
      color: gold;
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
    </style>
</head>

<body>

  <div class="topnav" >
 <h1 style="color:white;"> TSF ONLINE BANKING </h1> 
</div>

 


<center>
 
<div class="container">
    <div class="contact-box">
      <div class="left"></div>
      <div class="right">
        <h2></h2>
        <form action="customer.php" method="post" >
          <input name="ano" type="integer" class="field" placeholder= "Enter Account Number" required >
          <p></p>
        <button  type="submit" class="btn bttn">View Details</button>
        </form> 
      </div>
    </div>
  </div> 


 <div class="container my-4"> 
   <div class="col-lg-12">

    <table class=" table table-responsive table-striped table-hover table-bordered">
        <tr class="table-dark text-dark">
           
            <th width="10% ">Name</th>
            <th width="10%">Email</th>
            <th width="10%">Account Number</th>
            <th width="10%">Balance</th>
        
        </tr>

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
$sql = "SELECT * FROM customer_details ORDER BY account_no ASC ";
$result = $mysqli->query($sql);
     while($rows=$result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $rows['name'];?> </td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['account_no'];?> </td>
                <td><?php echo $rows['current_bal'];?> </td>        
              </tr>
    <?php                       
     }
     $mysqli->close(); 
    ?> 
</table>
</div>         
</div>

</center>


    

</body>

</html>