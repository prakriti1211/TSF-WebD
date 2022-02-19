<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" , href="index.css">
    <!-- <link rel="stylesheet" , href="transfer.css"> -->
</head>
<style>
    table{
        margin: 50px;
        border: 2px solid rgb(80,0,255);
        border-collapse: collapse;
    }
    th{
        font-size: 20px;
        padding: 10px 15px;
        text-align: center;
        border: 2px solid rgb(80,0,255);
        background-color: rgb(80,0,255);
        color: white;
        border-collapse: collapse;
    }
    td{
        padding: 10px 15px;
        text-align: center;
        border: 1px solid rgb(80,0,255);
        border-collapse: collapse;
    }
</style>

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
    
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "customer";
    $con = mysqli_connect($server, $username, $password, $database);
    if(!$con)
        die("Connection to the database failed due" . mysqli_connect_error());
    // else
    //     echo "Connection successful";
    $sno=1;
    $sql = "SELECT * FROM `transaction`";
    $result = $con->query($sql);
    if($result->num_rows > 0)
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>S No.</th>";
        echo "<th>Sender's Account Number</th>";
        echo "<th>Receiver's Account Number</th>";
        echo "<th>Amount Tranferred</th>";
        echo "<th>Time of The Transaction</th>";
        echo "</tr>";
     
        while($row = $result->fetch_assoc())
        {

            echo "<tr>";
            echo "<td>" . $sno . "</td>";
            echo "<td>" . $row["Sender's Account Number"] . "</td>";
            echo "<td>" . $row["Reciever's Account Number"] . "</td>";
            echo "<td>" . $row['Amount Transferred'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>";
            echo "</tr>";
            $sno++;
            }
            echo "</table>";
            } 
            $con->close();
?>

    <footer class="footer">
        <p>Copyright &copy NBI </p>
        <a href="mailto:nbi@customercare.com">nbi@customercare.com</a>
    </footer>
</body>
</html>