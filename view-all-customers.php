<!DOCTYPE html>
<html>
<style>
 th,td {
            text-align: center;
            border:1px solid black;
            border-collapse:collapse;
            padding:10px;
            
        }
body{
    margin:0;
    background-color: grey;
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
        style="width:80%; background-color:rgba(0,0,0,.5); padding:5px 5px 5px 5px; border-radius:30px; box-shadow: 2px 2px 10px gray; text-align: center;">
        <h1 style=" color:white;">All Customers</h1>
    </div>
    <?php



$conn = mysqli_connect('localhost', 'root', '', 'Banking');
if(!$conn){
die("Connection not established: ".mysqli_connect_error());
}else{

$sql = "SELECT * FROM  customers";
$result = mysqli_query($conn, $sql);
?>
    <table class="table table-dark" style="margin-top: 30px; font-size:35px;;">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Account No</th>
                <th scope="col">Balance</th>
                <th scope="col">Send Money From</th>
            </tr>
        </thead>

        <style>
            .mybtn {

                box-shadow: 2px 2px 10px black;
                border-radius: 30px;
                font-weight: bold;
                background-color: black;
                color: white;
            }

            .mybtn:active {
                background-color: white;
                color: black;
            }
        </style>
        <?php
echo "<tbody>";
while($row = mysqli_fetch_assoc($result)){
echo    '
    <tr>
      <td>'.$row['name'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['accno'].'</td>
      <td>'.$row['blc'].'</td>
      <td style="padding:20px 20px 20px 20px">
      <a href="send-money.php?reads='.$row['accno'].'"
      <button type="button" class="btn mybtn btn-outline-light">Transfer-Money</button>
      </a>
      </td>
    </tr>';
}

}
echo "</tbody>";
?>
</div>
</body>
</html>
