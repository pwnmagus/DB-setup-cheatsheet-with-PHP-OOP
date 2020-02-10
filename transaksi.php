<html>
<head><title>Check Transactions</title></head>
<body>
<br><strong>Transaction Details</strong><br>
            ===================<br><br>
</body>
</html>


<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "rumah_sakit";

// Create connection to the server
$connect = new mysqli($server, $username, $password, $dbname);
//Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 

$query= "SELECT 
t.TransactionsDate as dlt ,
b.BloodbankName as bbn,
p.PatientName as pn, 
d.DonorName as dn, 
p.PatientBloodtype as pbt 
FROM transactions t 
INNER JOIN patient p
on p.PatientId = t.Patient_Id
INNER JOIN donor d
on d.DonorId = t.Donor_Id
INNER JOIN bloodbank b
on b.BloodbankId = t.BloodBank_Id";

$result = $connect->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Last time Donor: " . $row["dlt"]. "<br> - Bank Name: " . $row["bbn"]. "<br> - Patient Name: " . $row["pn"]. "<br> - Donor Name: " . $row["dn"]. "<br> - Blood Type: " . $row["pbt"]. "<br><br><br>";
    }
} else {
    echo "0 results";
}

?>


<html> 
<body>
<br>
<strong><a href="index.html">Click here if you want to go back to homepage</a></strong><br>
</body>
</html>