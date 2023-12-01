import fs from "fs"

// Read the new data from the file
const newDataFilePath = 'fdData.json'; // Replace with the actual path to your file
const newDataJson = fs.readFileSync(newDataFilePath, 'utf-8');
const newData = JSON.parse(newDataJson);


// Add id to each entry
newData.forEach((entry, index) => {
    entry.id = index + 1; // Assuming you want to start ids from 1
});


// Log the updated JSON data
const fixedDeposit = JSON.stringify(newData, null, 2);

fs.writeFileSync('fixedDeposit.json', fixedDeposit);

