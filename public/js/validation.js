
function numbersOnly(e){
  
    if(e.keyCode > 47 && e.keyCode < 58){
        return true;
    }
    return false;
}
function requiredAllFields(){
    var d =  $("#submitNewExpenses").find('[name=expensesDesc]').val();
    alert(d);
}


