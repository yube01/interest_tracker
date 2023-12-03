<!DOCTYPE html>
<html>
<body>

<?php
$jsonobj = '[{
    "name": "Fixed Deposit-2Y&above",
    "institute_code": "Samriddhi Fin",
    "institute_name": "Samriddhi Finance Co.",
    "interest": "11.75%",
    "minimum_balance": "0",
    "max_tenure": "2 years"
    },
    {
    "name": "Fixed Deposit-3Y&above",
    "institute_code": "Best Finance",
    "institute_name": "Best Finance Co.",
    "interest": "11.50%",
    "minimum_balance": "0",
    "max_tenure": "3 years"
    },
    {
    "name": "Fixed Deposit-1Yto2Y",
    "institute_code": "Samriddhi Fin",
    "institute_name": "Samriddhi Finance Co.",
    "interest": "11.50%",
    "minimum_balance": "0",
    "max_tenure": "1 year"
    }]';
 
var_dump(json_decode($jsonobj, true));
?>

</body>
</html>