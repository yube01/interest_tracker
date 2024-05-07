const onEditCancel = (page)=>{
    const isConfirmed = confirm(`Are you sure you want to cancel process`);
if(isConfirmed){
    if(page === 'personal'){
        window.location.href = "../../loan/loan.php?type=loan";
    }else if(page === 'saving'){
        window.location.href = "../../home/home.php?type=saving";
    }else if(page === 'stloan'){
        window.location.href = "../../page/studentLoan.php?type=studentloan";
    }else if(page === 'student'){
        window.location.href = "../../page/studentSaving.php?type=studentSav";
    }
}
}