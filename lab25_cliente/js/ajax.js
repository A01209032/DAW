
window.addEventListener("load", function() {


    // Habilitar Ajax a los forms para que todo sea con js
    $('#registrar').click(function(ev) {
      ev.preventDefault();

      $.ajax({
        url: 'palabras.php',
        method: 'GET',
        data: {
          pattern: $('#input').val(),
          
            
        },
        success: function(data) {
         
        if(data=='Error'){
            alert('Error');
            

          }
          else{
            $('#ajaxResponse').html('');
            $('#ajaxResponse').html(data);
          }
        },
        dataType: 'text'
      });

      
    });

   

  });
  


