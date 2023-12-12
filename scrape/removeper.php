<?php

$jsonFilePath = "educationLoan.json";

$jsonData = file_get_contents($jsonFilePath);

// Decode JSON data
$bankData = json_decode($jsonData, true);

// Remove '%' from Saving and Fixed Deposit rates
foreach ($bankData as &$bank) {
    // $bank['Saving Account']['rate'] = str_replace('%', '', $bank['Saving Account']['rate']);
    $bank['interest'] = str_replace('%', '', $bank['interest']);
}

// Encode back to JSON
$updatedJsonData = json_encode($bankData, JSON_PRETTY_PRINT);

// Output the updated JSON data
$filename = 'eduLoan.json';
file_put_contents($filename, $updatedJsonData);

echo "Updated JSON data saved to $filename\n";

?>
