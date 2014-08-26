$(document).ready(function(){
$(".delete").click(del);
});
function del(){
    $.ajax({
        url:'http://localhost/WebMarket/includes/deleteProduct.php',
        type:'POST',
        data:{val1:$("#id").val()
            },
            
    }).done(function(data){
            $( "#filt" ).trigger( "click" );

      console.log(data);
    }).fail(function(er){
        console.log('error');
    }); 
    }