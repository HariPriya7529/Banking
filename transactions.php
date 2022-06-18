<!DOCTYPE html>
<html>
<style>
        th,
        td {
            text-align: center;
            border:1px solid black;
            border-collapse:collapse;
            padding:10px;
            font-size: 25px;
        }
        body{
            margin:0;
            
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


        <div class="container" style="margin-top: 10%; padding:10px 80px 10px 80px; ">
            <div
                style="width:80%; background-color:red; text-align:center; padding:5px 5px 5px 5px; border-radius:30px; box-shadow: 2px 2px 10px gray;">
                <h1 style=" color:white;">Transactions between customers</h1>
            </div>
            <?php

    $conn = mysqli_connect('localhost', 'root','', 'Banking');
    if(!$conn){
        die("Connection not established: ".mysqli_connect_error());
    }else{
    
        $sql = "SELECT * FROM transactions";
        $result = mysqli_query($conn, $sql);
?>
            <table class="table table-dark" style="margin-top: 30px; float:center;">
                <thead>
                    <tr>
                        <th scope="col">Sender</th>
                        <th scope="col">Reciever</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>

                <style>
                    .mybtn {

                        box-shadow: 2px 2px 10px black;
                        border-radius: 30px;
                        font-weight: bold;
                        background-color: lightgreen;
                        color: green;
                    }

                    .mybtn:active {
                        background-color: green;
                        color: lightgreen;
                    }
                </style>
                <?php
echo "<tbody>";
        while($row = mysqli_fetch_assoc($result)){
        if(!(empty($row['sender']) && empty($row['receiver']) && empty($row['amount'])))
            {echo    '
            <tr>
              <td>'.$row['sender'].'</td>
              <td>'.$row['receiver'].'</td>
              <td>'.$row['amount'].'</td>
              <td>'; ?> <?php if($row['status'] == "succeed"){echo '<b><p style="color:green;">Succeed</p></b>';}else{echo '<b><p style="color:red;">Failed</p></b>';} ?>
              <?php echo '</td>
              </tr>';}
    }
    
    }
    echo "</tbody>";
?>
        </div>
    
    </body>
</html>