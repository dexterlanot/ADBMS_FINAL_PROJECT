function showDonor(){  
    $.ajax({
        url:"../php/donor.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showRequest(){  
    $.ajax({
        url:"../php/request.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showHandedOver(){  
    $.ajax({
        url:"../php/handed-over.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showBloodStocks(){  
    $.ajax({
        url:"../php/blood-stock.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

