<!DOCTYPE html>
<html>
<style>
        .formin {
            border-radius: 20px;
            width: 380px;
            height: 50px;
            padding: 5px 5px 5px 15px;
            display: inline-block;
            text-align: center;

        }


        .mybtn {
            margin-bottom: 10px;
            box-shadow: 2px 2px 10px white;
            border-radius: 30px;
            float: left;
            font-weight: bold;
            color: black;
            font-size: 40px;
        }

        .mybtn:active {
            background-color: green;
            color: pink;
            text-align: left;
        }

        label ,input{
            padding-top: 10px;
            padding-bottom: 10px;
        }
        body{
            margin:0;
            background-color: #f4a896;
            
        }
        nav{
            background-color: black;
            overflow: hidden;
            position:fixed;
            top:0;
            width:100%;
            height:90px;
            
            
        }
        nav a{
            float:right;
            color: white;
            text-align: center;
            padding: 24px 16px;
            text-decoration: none;
            font-size: 25px;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
            height: 90px;
        }
        
    </style>
    <body>
    <nav>
  <img src="https://as2.ftcdn.net/v2/jpg/03/02/85/49/1000_F_302854935_fsTi6VSBMqsIwTFmAh04yVNlieDdV9W1.jpg" style="width:20%; height:100%"/> 
  <a href="transactions.php">Transactions</a>
  <a href="send-money.php">Send money</a>
  <a href="view-all-customers.php">View all customers</a>
  <a href="home.php" >Home</a>
    </nav>

        <div class="container" style="margin-top:2%;padding:80px;">
            <div
                style="width:80%; background-color:rgba(0,0,0,.5); padding:5px 5px 5px 5px; border-radius:30px; box-shadow: 2px 2px 10px gray;">
                <h1 style=" color:white; text-align:center;">Transfer Money</h1>
            </div>
            <br><br>
            <div class="" style=" backdrop-filter: blur(5px);  border-radius:5px; text-align:left; font-size:20px; ">
                <form action="send-money.php" method="post" >
                    <label>Enter sender acc number:</label>
                    <input type="text" class="formin form control" name="accno1" id=""
                                    placeholder="Sender's Account Number"
                                    value="<?php if(isset($_GET['reads'])){echo $_GET['reads'];} ?>"><br><br>
                    <label>Enter amount to transfer:</label>
                    <input type="number" class="formin form control" name="amount" id=""
                                    placeholder="Amount to Transfer"><br><br>
                    <label>Enter receiver acc number:</label>
                    <input type="text" class="formin form control" name="accno2" id=""
                                    placeholder="Reciever's Account Number"><br><br>

                    <br><input class="mybtn" type="submit" value="Transfer"><br><br>
                </form>
            </div>
        </div>


        <?php 

$conn = mysqli_connect('localhost', 'root', '', 'Banking');
if(!$conn){
	die("Connection not established: ".mysqli_connect_error());
}else{

if($_SERVER['REQUEST_METHOD']== 'POST'){

    
    $sender = $_POST['accno1'];
    $amount = $_POST['amount'];
    $reciever = $_POST['accno2'];
   
    
    $checkblcquery = "SELECT blc FROM customers where accno='$sender'";
    $checkblc = mysqli_query($conn, $checkblcquery);
    $ava_blc = mysqli_fetch_assoc($checkblc)['blc'];

    if($ava_blc >= $amount){
    $sql1 = "UPDATE customers SET blc= blc-$amount WHERE accno='$sender'";
    $sql2 = "UPDATE customers SET blc= blc+$amount WHERE accno='$reciever'";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    if($result1 && $result2){
        echo '<div class="alert alert-success align-items-center text-center" style="width:50%;color:white;" role="alert">
        <div>   
        <h2>
          Amount Transfered Successfully!</h2></div>
        </div>
      </div>';

      $sqltran = "INSERT INTO transactions VALUES ('$sender', '$reciever', '$amount', 'succeed')";
      $sqltransact = mysqli_query($conn, $sqltran);
    }else{
        echo '<div class="alert alert-danger d-flex align-items-center" style="color:white;"role="alert">
        <div>
        Something went wrong!
        </div>
      </div>';
      $sqltran = "INSERT INTO transactions VALUES ('$sender', '$reciever', '$amount', 'failed')";
      $sqltransact = mysqli_query($conn, $sqltran);
    }
}else{
    echo '<div class="alert alert-danger align-items-center text-center" style="width:50%; color:white;" role="alert">
        <div>   
        <h2>
        Not Sufficient Balance in Account!</h2></div>
        </div>
      </div>
      ';
      $sqltran = "INSERT INTO transactions VALUES ('$sender', '$reciever', '$amount', 'failed')";
      $sqltransact = mysqli_query($conn, $sqltran);
}
}
}
?>
    
    </body>

</html>