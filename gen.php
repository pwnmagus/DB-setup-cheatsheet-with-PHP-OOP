<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "rumah_sakit";

// Create connection to connect to DB on phpmyadmin
$connect = new mysqli($server, $username, $password);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
echo "<center>Connected to server</center><br>";

// Create empty database
$sql = "CREATE DATABASE if not exists rumah_sakit";
if ($connect->query($sql) === TRUE) {
    echo "<center>Database created successfully</center>";
} else {
    echo "Error creating database: " . $connect->error;
}


//Generate tables
// Create connection to the server
$connects = new mysqli($server, $username, $password, $dbname);
//Check connection
if ($connects->connect_error) {
    die("Connection failed: " . $connects->connect_error);
} 

// query to create table patient
$patient = "CREATE TABLE patient(
PatientId INT AUTO_INCREMENT PRIMARY KEY, 
PatientName VARCHAR(30) NOT NULL,
PatientBloodtype CHAR(3),
PatientDOB date
)";

// query to create table donor
$donor = "CREATE TABLE donor(
    DonorId INT AUTO_INCREMENT PRIMARY KEY, 
    DonorName VARCHAR(30) NOT NULL,
    DonorBloodtype CHAR(3),
    DonorDOB date,
    DonorLastTime date
    )";


// query to create table Blood Bank
$bloodbank = "CREATE TABLE bloodbank(
    BloodbankId INT AUTO_INCREMENT PRIMARY KEY, 
    BloodbankName VARCHAR(30) NOT NULL,
    BloodbankAddress VARCHAR (60) NOT NULL,
    BloodbankContact VARCHAR (15) NOT NULL
    )";

// query to create table Transactions
$transactions = "CREATE TABLE transactions(
    TransactionsId INT AUTO_INCREMENT PRIMARY KEY, 
    Patient_Id INT, 
    Donor_Id INT,
    BloodBank_Id INT,
    TransactionsDate date,
    
    FOREIGN KEY (Patient_Id) REFERENCES patient(PatientId),
    FOREIGN KEY (Donor_Id) REFERENCES donor(DonorId),
    FOREIGN KEY (BloodBank_Id) REFERENCES bloodbank(BloodbankId)

    )";



//Execute all query 


if ($connects->query($patient) === TRUE) {
    echo "<center>Table patient created successfully</center><br>";
} else {
    echo "Error creating table: " . $connects->error;
}

if ($connects->query($donor) === TRUE) {
    echo "<center>Table donor created successfully</center><br>";
} else {
    echo "Error creating table: " . $connects->error;
}

if ($connects->query($bloodbank) === TRUE) {
    echo "<center>Table Blood Bank created successfully</center><br>";
} else {
    echo "Error creating table: " . $connects->error;
}

if ($connects->query($transactions) === TRUE) {
    echo "<center>Table Transactions created successfully</center><br>";
} else {
    echo "Error creating table: " . $connects->error;
}



// Fill Table - DML

//insert data to table patient

$patientTB = "INSERT INTO patient (PatientName, PatientBloodtype, PatientDOB)
VALUES 
('Hildegarde', 'A', '1998-05-09'),
('Mila Kunis', 'AB', '1999-07-19'),
('Koishi Komeiji', 'B', '1995-05-24'),
('Remilia Scarlet', 'O', '1998-07-24'),
('Sakuya Izayoi', 'A', '1992-08-17')
";

//insert data to table donor

$donorTB = "INSERT INTO donor (DonorName, DonorBloodtype, DonorDOB, DonorLastTime)
VALUES 
('Yukari Yakumo', 'B', '1992-08-10', '2019-05-05'),
('Kasen Ibaraki', 'O', '2000-07-24', '2019-07-28'),
('Aya Shameimaru', 'A', '1996-01-02', '2019-04-05'),
('Eirin Yagokoro', 'AB', '1969-01-20', '2019-02-09'),
('Yuyuko Saigyouji', 'A', '1992-03-17', '2019-05-12')
";

//insert data to table Blood Bank

$bloodbankTB= "INSERT INTO bloodbank (BloodbankName, BloodbankAddress, BloodbankContact)
VALUES 
('Yagokoro Blood Bank', 'Eientei St.', '081808123654'),
('Houraisan Blood Bank', 'Bamboo St.', '087878669988'),
('Hartmann Blood Bank', 'Satorin St.', '081808256341'),
('Scarlet Blood Bank', 'Koumakan St.', '081808120110'),
('Moriya Blood Bank', 'Moriya St.', '081808145236')
";

//insert data to Transactions

$transactionsTB = "INSERT INTO transactions (Patient_Id, Donor_Id, BloodBank_Id, TransactionsDate)
VALUES 
('1', '1', '5', '2019-07-07'),
('2', '2', '4', '2019-08-14'),
('3', '3', '3', '2019-05-10'),
('4', '4', '2', '2019-03-24'),
('5', '5', '1', '2019-06-17')
";



// Execute all query

if ($connects->query($patientTB) === TRUE) {
    echo "<center> New record for patient table created successfully</center><br>";
} else {
    echo "Error: " . $patientTB . "<br>" . $connect->error;
}

if ($connects->query($donorTB) === TRUE) {
    echo "<center> New record for donor table created successfully</center><br>";
} else {
    echo "Error: " . $donorTB . "<br>" . $connects->error;
}


if ($connects->query($bloodbankTB) === TRUE) {
    echo "<center> New record for Blood Bank table created successfully</center><br>";
} else {
    echo "Error: " . $bloodbankTB . "<br>" . $connects->error;
}


if ($connects->query($transactionsTB) === TRUE) {
    echo "<center> New record for Transactions table created successfully</center><br>";
} else {
    echo "Error: " . $transactionsTB . "<br>" . $connects->error;
}


?>

<html> 
<body>
<br>
<strong><a href="index.html">Click here if you want to go back to homepage</a></strong><br>
</body>
</html>