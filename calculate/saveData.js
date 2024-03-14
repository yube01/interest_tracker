
function saveData(princ,time,rate,tax,total,bank,type,userId){
    console.log(bank)
$.ajax({
   type: 'POST',
   url: '../Db/calculate/saving.php', // Specify the server-sidfe script to handle the data
   data: { princ : princ,
    time : time,
    rate : rate,
    tax : tax,
    type:type,
    total : total,
    bank : bank,
    userId : userId},
   success: function(response) {
       console.log(response); // Log the server's response (you can handle it accordingly)
       window.location.href = `../history/saving.php?msg=${bank} data saved`;
   }
});
}




function loanData(princ,time,rate,emi,total,bank,type,userId){
    console.log(bank)
$.ajax({
   type: 'POST',
   url: '../Db/calculate/loan.php', // Specify the server-sidfe script to handle the data
   data: 
   { princ : princ,
    time : time,
    rate : rate,
    emi : emi,
    total : total,
    bank : bank,
    userId : userId,
    type :type

},
   success: function(response) {
       console.log(response); // Log the server's response (you can handle it accordingly)
       window.location.href = `../history/loan.php?msg=${bank} data saved`;
   }
});
}