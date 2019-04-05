
window.addEventListener("load", function() {


    // Habilitar Ajax a los forms para que todo sea con js
    $('#registrar').click(function(ev) {
      ev.preventDefault();

      $.ajax({
        url: 'controllers/mails.php',
        method: 'POST',
        data: {
          mail: $('#mail').val(),
          subject: $('#subject').val(),
          content: $('#content').val()
            
        },
        success: function(data) {
         
        if(data=='Error'){
            alert('Error');
            

          }
          else{
            $('#mail').val('');
            $('#subject').val('');
            $('#content').val('');
            $('#ajaxResponse').html('');
            $('#ajaxResponse').html(data);
          }
        },
        dataType: 'text'
      });

      
    });

  


  });
  


