$(document).ready(function(){

    $.ajax({
        url:'./pdf/documentos/res/barGraphic.php',
        success:function(data){
            $(".barGraphic").html(data).fadeIn('slow');
        }
    })

});

function load(page){

    $.ajax({
        url:'./pdf/documentos/res/barGraphic.php',
        success:function(data){
            $(".barGraphic").html(data).fadeIn('slow');
        }
    })

}