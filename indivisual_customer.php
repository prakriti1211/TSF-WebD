<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer</title>
    <link rel="stylesheet" , href="index.css">
</head>
<style>
    .heading{
        /* width: 100%; */
        height: 30px;
        padding-top: 10px;
        background-color: rgb(89,0,255);
        color: white;
        text-align: center;
        margin: 10px;
    }
    .details{
        margin:20px;
        padding: 10px;
        border: 1px solid rgb(89,0,255);
        text-align: center;
        height: 400px;
        /* display: flex; */
    }
    </style>
<header>
</header>

<body>
    <div class="UpperTitle">
        INDIA'S BANK
    </div>

    <div class="nav-bar">
        <ul class="nav-list">
            <li><a class="nav-items" href="transaction.php"> Transaction History </a></li>
            <li><a class="nav-items" href="transfer.html"> Transfer Money </a></li>
            <li><a class="nav-items" href="customer.php"> View Customers </a></li>
            <li><a class="nav-items" href="index.html"> Home </a></li>
        </ul>
    </div>

    <div class="heading">
        THE DETAILS OF THE CUSTOMER ARE:
    </div>

    <?php
        $name = $_GET['name'];
        $account_number = $_GET['account_number'];
        $balance = $_GET['balance'];
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "customer";
        $con = mysqli_connect($server, $username, $password, $database);
        if(!$con)
            die("Connection to the database failed due" . mysqli_connect_error());
        $sql = "SELECT * FROM `customer` WHERE `account_number` LIKE '$account_number';";
        $result = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result))
        {
            $email = $row['email'];
            $contact_number = $row['contact_number'];
            $pan_details = $row['pan_details'];
        }
    ?>

    <div class="details">
        <p><b> NAME OF THE CUSTOMER : <?php echo "   "."$name";?> </p>  
        <p> ACCOUNT NUMBER : <?php echo "   "."$account_number";?> </p>  
        <p> CONTACT NUMBER : <?php echo "   "."$contact_number";?> </p>  
        <p> EMAIL ID : <?php echo "   "."$email";?> </p>  
        <p> PAN DETAILS : <?php echo "   "."$pan_details";?> </p>  
        <p> CURRENT BALANCE : <?php echo "   "."$balance";?> </p>
    </div>  

    <footer class="footer">
        <p>Copyright &copy NBI</p>
        <a href="mailto:nbi@customercare.com">nbi@customercare.com</a>
    </footer>
</body>
</html>
