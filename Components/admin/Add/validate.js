

function validateInterestRate() {
    // Get the input element for the interest rate
    var rateInput = document.getElementsByName("rate")[0];
    
    // Get the value entered by the user
    var rateValue = parseFloat(rateInput.value);

    // Check if the rate is greater than 100
    if (rateValue > 100) {
        // Display an error message
        alert("Error: Interest rate cannot be greater than 100.");
        
        // Clear the input field
        rateInput.value = '';

        // Set focus back to the input field
        rateInput.focus();
    }
    if (rateValue <= 0) {
        // Display an error message
        alert("Error: Interest rate cannot be lower than 0");
        
        // Clear the input field
        rateInput.value = '';

        // Set focus back to the input field
        rateInput.focus();
    }
}


function validateMinBalance() {
    // Get the input element for the interest rate
    var minInput = document.getElementsByName("min")[0];
    
    // Get the value entered by the user
    var minValue = parseFloat(minInput.value);

    // Check if the rate is greater than 100
    if (minValue > 1000) {
        // Display an error message
        alert("Error: Minimum Balance cannot be greater than 1000.");
        
        // Clear the input field
        minInput.value = '';

        // Set focus back to the input field
        minInput.focus();
    }
    if (minValue < 0) {
        // Display an error message
        alert("Error: Minimum Balance cannot be lower than 0");
        
        // Clear the input field
        minInput.value = '';

        // Set focus back to the input field
        minInput.focus();
    }
}


function validateFix() {
    // Get the input element for the interest rate
    var rateInput = document.getElementsByName("fRate")[0];
    
    // Get the value entered by the user
    var rateValue = parseFloat(rateInput.value);

    // Check if the rate is greater than 100
    if (rateValue > 100) {
        // Display an error message
        alert("Error: Fixed Interest rate cannot be greater than 100.");
        
        // Clear the input field
        rateInput.value = '';

        // Set focus back to the input field
        rateInput.focus();
    }
    if (rateValue <= 0) {
        // Display an error message
        alert("Error: Fixed Interest rate cannot be lower than 0");
        
        // Clear the input field
        rateInput.value = '';

        // Set focus back to the input field
        rateInput.focus();
    }
}

function validateSave() {
    // Get the input element for the interest rate
    var rateInput = document.getElementsByName("sRate")[0];
    
    // Get the value entered by the user
    var rateValue = parseFloat(rateInput.value);

    // Check if the rate is greater than 100
    if (rateValue > 100) {
        // Display an error message
        alert("Error: Saving Interest rate cannot be greater than 100.");
        
        // Clear the input field
        rateInput.value = '';

        // Set focus back to the input field
        rateInput.focus();
    }
    if (rateValue <= 0) {
        // Display an error message
        alert("Error: Saving Interest rate cannot be lower than 0");
        
        // Clear the input field
        rateInput.value = '';

        // Set focus back to the input field
        rateInput.focus();
    }
}