const onEditCancel = (page)=>{
    const isConfirmed = confirm(`Are you sure you want to cancel process`);
if(isConfirmed){
    if(page === 'personal'){
        window.location.href = "../../loan/loan.php";
    }else if(page === 'saving'){
        window.location.href = "../../home/home.php";
    }else if(page === 'stloan'){
        window.location.href = "../../page/studentLoan.php";
    }else if(page === 'student'){
        window.location.href = "../../page/studentSaving.php";
    }
}
}