$(document).ready(function(){
    $("#btn-item").click(function(){
        $(".add-medical-supply").fadeIn(500);
    });
    $("#btn-item-cancel").click(function(){
        $(".add-medical-supply").fadeOut(500);
    });
    $("#btn-add-item").click(function(){
        $(".add-medical-supply").fadeOut(500);
    });
})