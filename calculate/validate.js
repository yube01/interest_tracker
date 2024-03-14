function validatePrinciple() {
    // Get the input element for the interest rate
    var principleInput = document.getElementsByName("amount")[0];
    
    // Get the value entered by the user
    var principleValue = parseFloat(principleInput.value);

    // Check if the rate is greater than 100
    if (principleValue > 1000000000) {
        // Display an error message
        alert("Error: Principle amount cannot be greater than 1000000000.");
        
        // Clear the input field
        principleInput.value = '';

        // Set focus back to the input field
        principleInput.focus();
    }
    if (principleValue <= 0) {
        // Display an error message
        alert("Error: Principle amount cannot be lower than 0");
        
        // Clear the input field
        principleInput.value = '';

        // Set focus back to the input field
        principleInput.focus();
    }
}


function validateTime() {
    // Get the input element for the interest rate
    var loanInput = document.getElementsByName("time")[0];
    
    // Get the value entered by the user
    var loanValue = parseFloat(loanInput.value);

    // Check if the rate is greater than 100
    if (loanValue > 100) {
        // Display an error message
        alert("Error: Loan tenure cannot be greater than 100.");
        
        // Clear the input field
        loanInput.value = '';

        // Set focus back to the input field
        loanInput.focus();
    }
    if (loanValue <= 0) {
        // Display an error message
        alert("Error: Loan tenure cannot be lower than 0");
        
        // Clear the input field
        loanInput.value = '';

        // Set focus back to the input field
        loanInput.focus();
    }
}

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