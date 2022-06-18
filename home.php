<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
    <style>
        body{
            margin:0;
            background-color: black;
        }
        nav{
            background-color: grey;
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
        .content{
            margin: 0;
            height: 100%;
            width:100%;
        }
        .content p{
            font-size: 120px;
            color:azure;
            text-align: center;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-shadow:5px 5px 5px grey;
        }
        img{
            display: block;
            margin-top:0;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .footer{
            position: static;
            left:0;
            bottom:0;
            width: 100%;
            
            color:antiquewhite;
            text-align: center;


        }
        nav img{
            float:left;
        }

        

    </style>
<nav>
  <img src="https://as2.ftcdn.net/v2/jpg/03/02/85/49/1000_F_302854935_fsTi6VSBMqsIwTFmAh04yVNlieDdV9W1.jpg" style="width:20%; height:100%"/> 
  <a href="transactions.php">Transactions</a>
  <a href="send-money.php">Send money</a>
  <a href="view-all-customers.php">View all customers</a>
  <a href="home.php" >Home</a>
    </nav>
<div class="content">
    <p>Welcome to HP Bank!</p>
</div>
<div>
<img src="https://thumbs.dreamstime.com/b/bank-icon-black-coloured-grey-background-bank-icon-black-coloured-grey-background-vector-117123203.jpg" width="600px" height="600px" />
    
</div>
<div class="footer">
    <h1>
        Thank you for visting our website 
    </h1>
    <h2>
        powered by haripriya
    </h2>
</div>
</body>

</html>