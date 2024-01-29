<?php

// Assuming you have a MySQL database
$servername = "localhost";
$username = "root";
$password = "yube";
$dbname = "interest_tracker";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Path to the file containing JSON data
$jsonFilePath = "personalLoan.json";

// Read JSON data from the file
$jsonData = file_get_contents($jsonFilePath);

// Decode the JSON data
$data = json_decode($jsonData, true);

// Insert each record into the database
foreach ($data as $record) {
   
    $name = $record['institute_name'];
    $code = $record['institute_code'];
    $interest = $record['interest'];

    // $instituteCode = $record['institute_code'];
    // $instituteName = $record['institute_name'];
    // $interest = $record['interest'];
    // $minBalance = $record['minimum_balance'];
    // $maxTenure = $record['max_tenure'];

    $sql = "INSERT INTO personal_loan (name,code,interest) VALUES ('$name','$code','$interest')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();

?>
