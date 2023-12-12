<?php

// Read the existing JSON file
$jsonData = file_get_contents('personalLoan.json');

// Decode the JSON data
$data = json_decode($jsonData, true);

// Filter data based on the "name" field
$filteredData = array_filter($data, function ($loan) {
    return isset($loan['name']) && $loan['name'] === 'Personal Loan';
});

// Encode the filtered data back to JSON
$newJsonData = json_encode(array_values($filteredData), JSON_PRETTY_PRINT);

// Write the new JSON data to a new file
file_put_contents('personalL.json', $newJsonData);

echo "Filtered JSON file created successfully!";
?>
