<?php

// Read the existing JSON file
$jsonData = file_get_contents('per.json');

// Decode the JSON data
$data = json_decode($jsonData, true);

// Modify the "interest" values
foreach ($data as &$loan) {
    if (isset($loan['interest'])) {
        // Extract the lower and upper bounds of the interest range
        list($lower, $upper) = array_map('floatval', explode('-', $loan['interest']));

        // Calculate the middle value
        $middle = ($lower + $upper) / 2;

        // Format the middle value and place it back in the "interest" field
        $loan['interest'] = number_format($middle, 2);
    }
}

// Encode the modified data back to JSON
$newJsonData = json_encode($data, JSON_PRETTY_PRINT);

// Write the new JSON data to a new file
file_put_contents('personalLoan.json', $newJsonData);

echo "New JSON file created successfully!";
?>
