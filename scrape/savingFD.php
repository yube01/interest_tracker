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
$jsonFilePath = "savingAndFixed.json";

// Read JSON data from the file
$jsonData = file_get_contents($jsonFilePath);

// Decode the JSON data
$data = json_decode($jsonData, true);

// Insert each record into the database
foreach ($data as $record) {
   
    $name = $record['name'];
    $code = $record['code'];
    $saving_rate = $record['Saving Account']['rate'];
    $fixed_rate = $record['Fixed Deposit']['rate'];
    // $instituteCode = $record['institute_code'];
    // $instituteName = $record['institute_name'];
    // $interest = $record['interest'];
    // $minBalance = $record['minimum_balance'];
    // $maxTenure = $record['max_tenure'];

    $sql = "INSERT INTO saving_fixed (name,code,saving_rate,fixed_rate) VALUES ('$name','$code','$saving_rate','$fixed_rate')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();

?>
