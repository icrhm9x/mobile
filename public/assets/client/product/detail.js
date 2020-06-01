$(document).ready(function () {
    let listStar = $(".ratingJS");
    listStar.mouseover(function(){
        let number = $(this).attr('data-key');
        $.each(listStar, function(key, value){
            if(key + 1 <= number){
                $(this).removeClass('fa-star-o');
                $(this).addClass('fa-star');
            }else{
                $(this).removeClass('fa-star');
                $(this).addClass('fa-star-o');
            }
        });
    });
    listStar.click(function(){
        let number = $(this).attr('data-key');
        $(".number_rating").val(number);
        $.each(listStar, function(key, value){
            $(this).unbind('mouseover');
            if(key + 1 <= number){
                $(this).removeClass('fa-star-o');
                $(this).addClass('fa-star');
            }else{
                $(this).removeClass('fa-star');
                $(this).addClass('fa-star-o');
            }
        });
    });
});
