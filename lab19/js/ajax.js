function getRequestObject() {
  // Asynchronous objec created, handles browser DOM differences

  if(window.XMLHttpRequest) {
    // Mozilla, Opera, Safari, Chrome, IE 7+
    return (new XMLHttpRequest());
  }
  else if (window.ActiveXObject) {
    // IE 6-
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else {
    // Non AJAX browsers
    return(null);
  }
}

function sendRequest(){
   //alert('prueba');
   request=getRequestObject();
   if(request!=null)
   {
       //alert('prueba null');
     var userInput = document.getElementById('input').value;
     
     var url='palabras.php?pattern='+userInput;
     request.open('GET',url,true);
     request.onreadystatechange = 
            function() { 
                //alert('prueba funcion');
                if((request.readyState==4)){
                    //alert()
                    //alert('prueba state');
                    // Asynchronous response has arrived
                    var ajaxResponse=document.getElementById('ajaxResponse');
                    ajaxResponse.innerHTML=request.responseText;
                    ajaxResponse.style.visibility="visible";
                    
                }     
            };
     request.send(null);
   }
}



