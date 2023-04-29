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

