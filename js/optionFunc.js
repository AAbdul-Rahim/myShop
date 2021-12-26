$(document).ready(function (){
    $(".select1").change(function (){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if (optionValue){
                $(".product-wrapper").not("." + optionValue).hide();
                $('.' + optionValue).show();
            }else {
                ("." + optionValue).hide();
            }
        });
    });
});