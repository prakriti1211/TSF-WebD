<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" , href="index.css">
</head>

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
    <div class="container">
        <b>Thank you for using the services!
    </div>

    <footer class="footer">
        <p>Copyright &copy NBI</p>
        <a href="mailto:nbi@customercare.com">nbi@customercare.com</a>
    </footer>
</body>

</html>
<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "customer";
    $con = mysqli_connect($server, $username, $password, $database);
    if(!$con)
        die("Connection to the database failed due" . mysqli_connect_error());
    $sender_account= $_POST['sender_account'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_account = $_POST['receiver_account'];
    $amount = $_POST['amount'];
    $sql = "SELECT `balance` FROM `customer` WHERE `account_number` LIKE '$sender_account';";
    $result1 = mysqli_query($con,$sql);
    $sender_bal;
    // $new_bal;
    $receiver_bal;

    while($row=mysqli_fetch_array($result1))
    {
        $sender_bal = $row['balance'];
    }
    // echo "$sender_bal";
    $sql = "SELECT `balance` FROM `customer` WHERE `account_number` like '$receiver_account';";
    $result2 = mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result2))
    {
        $receiver_bal = $row['balance'];
    }
    // echo "$receiver_bal";
    if(empty($amount) || empty($sender_account) || empty($receiver_account) || empty($receiver_name))
    {
        echo '<script>alert("Please enter all the fields correctly!")</script>';
    }

    else if($sender_bal>$amount)
    {
        echo '<script> alert("Transaction Successful. Check transaction history by click on Transaction History.") </script>';
        $sender_bal = $sender_bal - $amount;
        $sql = "UPDATE `customer` SET `balance` = '$sender_bal' WHERE `account_number` LIKE '$sender_account';";
        mysqli_query($con,$sql);
        $receiver_bal = $amount + $receiver_bal;
        $sql = "UPDATE `customer` SET `balance` = '$receiver_bal' WHERE `account_number` LIKE '$receiver_account';";
        mysqli_query($con,$sql);
        $sql = "INSERT INTO `transaction` (`Sender's Account Number`, `Reciever's Account Number`, `Amount Transferred`, `Date`) VALUES ('$sender_account', '$receiver_account', '$amount', current_timestamp());";
        mysqli_query($con,$sql);
        
    }
    else
        echo '<script> alert("Insufficient balance in the account.") </script>';
?>
