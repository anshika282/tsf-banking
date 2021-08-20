<!-- filename =transfer.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Transfer</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  
  $msg="";
  if(isset($_POST['submit']))
  {
    $sqli="INSERT into transfer_details (transfered_from,transfered_to,amount) values(".$_POST['cust_acc_no'].",".$_POST['transfer_to'].",".$_POST['amount'].")";
    if($mysqli->query($sqli))
    { 
             $msg="transfered successfully";
             echo "<span style='background: #cccccc;'>".$msg."</span>";
    }
    else
    {
      $msg="Transfer failed";
    }
    
    $sqli="UPDATE customer_details SET current_bal=current_bal-".$_POST['amount']." WHERE account_no=".$_POST['cust_acc_no'];
    $mysqli->query($sqli);
    
    $sqli="UPDATE customer_details SET current_bal=current_bal+".$_POST['amount']." WHERE account_no=".$_POST['transfer_to'];
    $mysqli->query($sqli);
    
    
  } 
    $cid = mysqli_real_escape_string($mysqli, $_GET["ano"]);

    $sql =  "SELECT * FROM customer_details WHERE account_no='".$cid."'";
    $result = $mysqli->query($sql);
  
  $cust_sql = "SELECT * FROM customer_details ORDER BY account_no ASC ";
$cust_result = $mysqli->query($cust_sql);
  //print_r($cust_result); die;
//$sql= "SELECT * FROM customer_details WHERE account_no='2'";
//$result = $mysqli->query($sql);
$mysqli->close(); 
?>
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
    <?php  echo $msg; ?>
     <form action="transfer.php?ano=<?php  echo $_GET['ano']; ?>" method="post">
       <table class=" table table-responsive table-striped table-hover table-bordered">
           <?php  
                while($rows=$result->fetch_assoc())
                {
             ?>
        <tr class="table-dark text-dark">
           
            <th width="390">Name</th>
            <td><?php echo $rows['name'];?> </td>       
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
           
            <th width="50%">Transfer To</th>
             <td>
  
    <select name="transfer_to" width="298px">
      <?php  
                while($cust_rows=$cust_result->fetch_assoc())
                {
        if($rows['account_no']!= $cust_rows['account_no'])
        {
             ?>
    
    <option value="<?php echo $cust_rows['account_no']?>"><?php echo $cust_rows['name']?> </option>
    <?php } }?> </select>
     </td>      
        </tr>
         <tr class="table-dark text-dark">     
         <th width="50%">Amount</th>  
         <td> <input type="number" name="amount" /> </td>
         </tr>
     <input type="hidden" name="cust_acc_no" value=" <?php echo $rows['account_no'] ?>" />
     <?php
                }
             ?>       
              
  </table> 
   <h1> <button type="submit" class="button button1" name="submit">Transfer </button> 
  <a class="button1 button"href="view_customers.php"> Main Menu </a>
  </h1>
 </form>
</center>
                    
    

</body>

</html>