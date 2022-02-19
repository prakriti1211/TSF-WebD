<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer</title>
    <link rel="stylesheet" , href="index.css">
    <!-- <link rel="stylesheet" , href="transfer.css"> -->
</head>
<style>
    table{
        margin: 50px;
        border: 2px solid rgb(80,0,255);
        /* display: flex; */
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
    $sql = "SELECT * FROM customer";
    $result = $con->query($sql);
    if($result->num_rows > 0)
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>S No.</th>";
        echo "<th>NAME</th>";
        echo "<th>ACCOUNT NUMBER</th>";
        echo "<th>CURRENT BALANCE</th>";
        echo "</tr>";
     
        while($row = $result->fetch_assoc())
        {

            echo "<tr>";
            echo "<td>" . $sno . "</td>";
            //$name=$row['name'];
            //echo "<td><a href=indivisual_customer.php?".$name.">".$row['name']."</a></td>";
            // echo "<td><a href='indivisual_customer.php?name=".$row['name']."&account_number=".$row['account_number']."&contact_number=".$row['contact_number']."&email=".$row['email']."&balance=".$row['balance']."&pan_details=".$row['pan_details']."'>" .$row['name'] . "</a></td>";
            echo "<td><a href='indivisual_customer.php?name=".$row['name']."&account_number=".$row['account_number']."&balance=".$row['balance']."'>" .$row['name'] . "</a></td>";
            echo "<td>" . $row['account_number'] . "</td>";
            echo "<td>" . $row['balance'] . "</td>";
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