$(document).ready(function(){
  $(".buyPr").click(function(){
      $("#id").val(this.id);
          load();});
});
function load(){
    $.ajax({
        url:'http://localhost/WebMarket/counter.php',
        type:'POST',
        data:{val1:$("#id").val(),
              val2:$("#res").val(),
              val3:''
            },
            dataType:'json'
    }).done(function(data){
        $("#textRes").val(data.text);
        $("#res").val(parseInt(data.count));
        console.log(data);
    }).fail(function(er){
        console.log('error');
    }); 
    }

 

  